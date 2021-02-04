<template>
	<div>
		<div :id="'accordion' + index" class="w-100 mb-2" v-for="(question, index) in questions">
		    <div class="card text-white" :class="index == qid ? 'bg-success' : 'bg-secondary'">
		        <div class="card-header p-1 cursor" 
		            :class="index == qid ? 'bg-success' : 'bg-secondary'" 
		            :id="'heading'+ index" 
		            data-toggle="collapse" 
		            :data-target="'#collapse'+ index" 
		            aria-expanded="true" 
		            :aria-controls="'collapse'+ index">
		            <span class="text-white rounded-circle" :class="{qid: index == qid}">{{ index + 1 }}</span>
		              {{ question.question_text }}
		        </div>

		        <div :id="'collapse'+ index" class="collapse" :class="{show: index == qid}" :aria-labelledby="'heading'+ index" :data-parent="'#accordion' + index">
		          <div class="card-body p-0">
		            <div class="col-md-8 offset-md-2" 
		                v-if="question.more_info_link">
		                <img class="image w-100 mb-2 rounded" :src="question.more_info_link" style="max-height:40vh">
		            </div>
		            <ul class="list-group text-dark">
		                <li v-for="(option, index) in question.options" :key="option.id" class="list-group-item d-flex justify-content-between align-items-center p-1">
		                    <small>
		                        {{ option.option }}
		                    </small>
		                    <span v-if="option.correct ==1">
		                        <i class="fa fa-check text-success" aria-hidden="true"></i>
		                    </span>
		                </li>
		              
		            </ul>
		          </div>
		        </div>
		    </div>
		</div>
		
	</div>
	
	
</template>

<script>
	export default {
		props: ['questions', 'qid'],

		methods: {
			ToText(input){
              return input.replace(/<(style|script|iframe)[^>]*?>[\s\S]+?<\/\1\s*>/gi,'').replace(/<[^>]+?>/g,'').replace(/\s+/g,' ').replace(/ /g,' ').replace(/>/g,' ').replace(/&nbsp;/g,'').replace(/&rsquo;/g,'');  
            },
		}


	};
</script>