$(document).ready(function() {
	$.ajax({
		type: "GET",
		url: "getTweets.php",
		dataType: "json",
		success: function(tweets, status) {
			for(var i = 0; i < 5; i++) {
				$("#tweets").prepend("<li><img width='40px' height='40px' class='dp' src='"
					+ tweets[i].user.profile_image_url +"'></img><div class='tweet'>"+tweets[i].text+"</div></li>");
				$("img").error(function() {
					$(this).unbind("error").attr("src", "resources/twitter-bird.png");
				}); //end img error function
			} //end for loop
			
			var count = 5;
			var timer = setInterval(function(){
				if(count == tweets.length){
					count = 0;
				}
				var listItemHTML = "<li><img class='dp' width='40px' height='40px' src='"
					+tweets[count].user.profile_image_url+ "'></img><div class='tweet'>" + tweets[count].text + "</div></li>";
				$(listItemHTML).hide().css("opacity",0.0).prependTo('#tweets').slideDown('slow').animate({opacity:1.0});
				$("img").error(function () {
					$(this).unbind("error").attr("src", "resources/twitter-bird.png");
				});
				if(count != tweets.length) {
					count++;
				}
				$("#tweets li:gt(4):last").remove();
			}, 2000);

			var count = 0;
			var j = 0;
			while(j < 5) {
				if(tweets[count].entities.hashtags.length != 0){
					$("#hashtags").prepend("<li> #" + tweets[count].entities.hashtags[0].text + "</li>");
					j++;
				}
				count++;
			}
			var timer = setInterval(function() {
				if(count == tweets.length) {
					count = 0;
				}
				while(tweets[count].entities.hashtags.length == 0){
					count++;
				}
				var listItemHTML = "<li> #" + tweets[count].entities.hashtags[0].text + "</li>";
				$(listItemHTML).hide().css('opacity',0.0).prependTo('#hashtags').slideDown('slow').animate({opacity:1.0});
				if (count != tweets.length) {
					count++;
				}
				$("#hashtags li:gt(4):last").remove();
			}, 2200);
		},
		error: function(msg) {
			alert("There was an error: " + msg.status + " " + msg.statutText);
		}
	});
});