$(document).ready(function(){
	$.ajax({
		type: "GET",
		url : "resources/datafeeds/getProfile.php",
		dataType: "json",
		success: function(profile, status) {
			$("#profile_name").append(profile.name)
			$("#info").append(profile.location);
			$("#summ").append(profile.description);
		},
		error: function(msg) {
			alert("There was an error: " + msg.status + " " + msg.statusText);
		}
	});
	$.ajax({
		type: "GET",
		url: "resources/datafeeds/getTweets.php",
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
		},
		error: function(msg) {
			alert("There was an error: " + msg.status + " " + msg.statusText);
		}
	});
});