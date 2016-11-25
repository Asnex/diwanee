</html>  

 <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
  integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
  crossorigin="anonymous"></script>
  
  <script>
       //callback handler for form submit on register action
$("#register-form").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            // Show response from ajax registration proccess...
            $(".response").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});

// Function for login form
$("#login-form").submit(function(e)
{
    var postData = $(this).serializeArray();
    var formURL = $(this).attr("action");
    var redirect_url = "http://localhost/diwanee";
    $.ajax(
    {
        url : formURL,
        type: "POST",
        data : postData,
        success:function(data, textStatus, jqXHR) 
        {
            // If login success, redirect to main page
              if(data == "success")
            window.location.href = redirect_url;
        else
            // Else, show Ajax response
            $(".response").html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
});

// Function for tab selecting...
$('[data-toggle="tab"]').click(function(e) {
var $this = $(this),
loadurl = $this.attr('href'),
targ = $this.attr('data-target');

$.get(loadurl, function(data) {
$(targ).html(data);
});

$this.tab('show');
return false;
});

// Function for show modal on tab click
$('.modal-toggle').click(function(e){
    var tab = e.target.hash; 
    $('li > a[href="' + tab + '"]').tab("show");
});

// Logout Jquery action
 $("#btn-submit-logout").click(function(e){
       $(this).data('clicked', true); {
           if($('#btn-submit-logout').data('clicked')) {
  
       
       var redirect_url = "http://localhost/diwanee";
    $.ajax(
    {
        url : "./action.php",
        type: "POST",
        data : {checker:"logout"},
        success:function(data, textStatus, jqXHR) 
        {
            // If logout success, redirect to main page
              if(data == "logout_success") {
            window.location.href = redirect_url;
              } else
            // Else, show Ajax response
          return false;
        },
        error: function(jqXHR, textStatus, errorThrown) 
        {
            //if fails      
        }
    });
    e.preventDefault(); //STOP default action
    e.unbind(); //unbind. to stop multiple form submit.
      }}
 });

      </script>
 
  <script type="text/javascript" src="./js/diwanee.js"></script>
		



