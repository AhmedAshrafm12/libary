<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

$(ring).click(function(){
    $(pulse).fadeOut();
    $.get('/seen/'+{{ Auth::user()->id }} ,function(data){
        console.log(data)
    })
    // console.log("cl")
})
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('58315bf41dbef3f6b093', {
    cluster: 'mt1'
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
let obj = data.message;

if(obj.user_id == {{ Auth::user()->id }})
{
    notifis.innerHTML+=`
    <a class="d-flex p-3 border-bottom" href="#">
											<div class="notifyimg bg-pink">
												<i class="la la-file-alt text-white"></i>
											</div>
											<div class="mr-3">
												<h5 class="notification-label mb-1">${obj.massage}</h5>
												<div class="notification-subtext">10 hour ago</div>
											</div>
											<div class="mr-auto" >
												<i class="las la-angle-left text-left text-muted"></i>
											</div>
										</a>
    `
    
$(pulse).fadeIn();
}
else
console.log({{ Auth::user()->id }} , obj.user_id);

  });
</script>