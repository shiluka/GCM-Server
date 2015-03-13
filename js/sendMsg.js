$(document).ready(function(){
                
            });
            function sendPushNotification(id){
                var data = $('form#'+id).serialize();
                $('form#'+id).unbind('submit');               
                $.ajax({
                    url: "./gcm/send_message.php",
                    type: 'GET',
                    data: data,
                    beforeSend: function() {
                         
                    },
                    success: function(data, textStatus, xhr) {
                          $('.txt_message').val("");
                    },
                    error: function(xhr, textStatus, errorThrown) {
                         
                    }
                });
                return false;
            }
			
			$(document).ready(function(){
                
            });
            function sendPushNotificationAll(array){
                $.ajax({
                    url: "./gcm/send_message.php",
                    type: 'POST',
                    data: 'message=' + encodeURIComponent($('.txt_message').val()) + '&regId[]=' + array.join('&regId[]='),
                    beforeSend: function() {
                         
                    },
                    success: function(data, textStatus, xhr) {
                          $('.txt_message').val("");
                    },
                    error: function(xhr, textStatus, errorThrown) {
                         
                    }
                });
				return false;	
            }