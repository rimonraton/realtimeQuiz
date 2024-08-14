@component('mail::message')
  # হ্যালো $user->name
# আপনি এই ইমেলটি পাচ্ছেন কারণ আমরা আপনার অ্যাকাউন্টের জন্য একটি পাসওয়ার্ড পুনরায় সেট করার অনুরোধ পেয়েছি৷

## যাচাইকরণ কোড $verification

@component('mail::button', ['url' => 'https://gyankosh.org/updatePassword?verification='.$verification])
পাসওয়ার্ড রিসেট করুন
@endcomponent
আপনি যদি পাসওয়ার্ড রিসেটের অনুরোধ না করে থাকেন, তাহলে আর কোনো পদক্ষেপের প্রয়োজন নেই।


Thanks,<br>
{{ config('app.name') }}
@endcomponent
