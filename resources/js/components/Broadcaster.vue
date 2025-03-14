<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <button class="btn btn-success" @click="startStream">
          Start Stream</button
        ><br />
        <p v-if="isVisibleLink" class="my-5">
          Share the following streaming link: {{ streamLink }}
        </p>
        <video autoplay ref="broadcaster"></video>
      </div>
    </div>
  </div>
</template>

<script>
import Peer from "simple-peer";
import { getPermissions } from "../helpers";
export default {
  name: "Broadcaster",
  props: [
    "auth_user_id",
    "env",
    "turn_url",
    "turn_username",
    "turn_credential",
  ],
  data() {
    return {
      isVisibleLink: false,
      streamingPresenceChannel: null,
      streamingUsers: [],
      currentlyContactedUser: null,
      allPeers: {}, // this will hold all dynamically created peers using the 'ID' of users who just joined as keys
    };
  },
  computed: {
    streamId() {
      // you can improve streamId generation code. As long as we include the
      // broadcaster's user id, we are assured of getting unique streamiing link everytime.
      // the current code just generates a fixed streaming link for a particular user.
      return `${this.auth_user_id}12acde2`;
    },
    streamLink() {
      // just a quick fix. can be improved by setting the app_url
      if (this.env === "production") {
        return `https://gyankosh.org/streaming/${this.streamId}`;
      } else {
        return `https://quiz.test/streaming/${this.streamId}`;
      }
    },
  },
  methods: {
    async startStream() {
      // const stream = await navigator.mediaDevices.getUserMedia({
      //   video: true,
      //   audio: true,
      // });
      // microphone and camera permissions
      const stream = await getPermissions();
      this.$refs.broadcaster.srcObject = stream;
      this.initializeStreamingChannel();
      this.initializeSignalAnswerChannel(); // a private channel where the broadcaster listens to incoming signalling answer
      this.isVisibleLink = true;
    },
    peerCreator(stream, user, signalCallback) {
      let peer;
      return {
        create: () => {
          peer = new Peer({
            initiator: true,
            trickle: false,
            stream: stream,
            config: {
              iceServers: [
                {
                  urls: "stun:stun.l.google.com:19302",
                },
                {
                  urls: this.turn_url,
                  username: this.turn_username,
                  credential: this.turn_credential,
                },
              ],
            },
          });
        },
        getPeer: () => peer,
        initEvents: () => {
          peer.on("signal", (data) => {
            // send offer over here.
            signalCallback(data, user);
          });
          peer.on("stream", (stream) => {
            console.log("onStream");
          });
          peer.on("track", (track, stream) => {
            console.log("onTrack");
          });
          peer.on("connect", () => {
            console.log("Broadcaster Peer connected");
          });
          peer.on("close", () => {
            console.log("Broadcaster Peer closed");
          });
          peer.on("error", (err) => {
            console.log("handle error gracefully");
          });
        },
      };
    },
    initializeStreamingChannel() {
      this.streamingPresenceChannel = window.Echo.join(
          `streaming-channel.${this.streamId}`
      );
      this.streamingPresenceChannel.here((users) => {
        this.streamingUsers = users;
      });
      this.streamingPresenceChannel.joining((user) => {
        console.log("New User", user);
        // if this new user is not already on the call, send your stream offer
        const joiningUserIndex = this.streamingUsers.findIndex(
            (data) => data.id === user.id
        );
        if (joiningUserIndex < 0) {
          this.streamingUsers.push(user);
          // A new user just joined the channel so signal that user
          this.currentlyContactedUser = user.id;
          this.$set(
              this.allPeers,
              `${user.id}`,
              this.peerCreator(
                  this.$refs.broadcaster.srcObject,
                  user,
                  this.signalCallback
              )
          );
          // Create Peer
          this.allPeers[user.id].create();
          // Initialize Events
          this.allPeers[user.id].initEvents();
        }
      });
      this.streamingPresenceChannel.leaving((user) => {
        console.log(user.name, "Left");
        // destroy peer
        this.allPeers[user.id].getPeer().destroy();
        // delete peer object
        delete this.allPeers[user.id];
        // if one leaving is the broadcaster set streamingUsers to empty array
        if (user.id === this.auth_user_id) {
          this.streamingUsers = [];
        } else {
          // remove from streamingUsers array
          const leavingUserIndex = this.streamingUsers.findIndex(
              (data) => data.id === user.id
          );
          this.streamingUsers.splice(leavingUserIndex, 1);
        }
      });
    },
    initializeSignalAnswerChannel() {
      window.Echo.private(`stream-signal-channel.${this.auth_user_id}`).listen(
          "StreamAnswer",
          ({ data }) => {
            console.log("Signal Answer from private channel");
            if (data.answer.renegotiate) {
              console.log("renegotating");
            }
            if (data.answer.sdp) {
              const updatedSignal = {
                ...data.answer,
                sdp: `${data.answer.sdp}\n`,
              };
              this.allPeers[this.currentlyContactedUser]
                  .getPeer()
                  .signal(updatedSignal);
            }
          }
      );
    },
    signalCallback(offer, user) {
      axios
          .post("/stream-offer", {
            broadcaster: this.auth_user_id,
            receiver: user,
            offer,
          })
          .then((res) => {
            console.log(res);
          })
          .catch((err) => {
            console.log(err);
          });
    },
  },
};
</script>

<style scoped>
</style>