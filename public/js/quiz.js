function Quiz(id, questions){
	this.id = id;
	this.questions = questions;
	this.currentQuestion = undefined;
	this.olderQuestions = [];
};

Quiz.prototype.getQuestion = function(questionId) {
	var url = '/quiz/' + this.id + '/question/' + questionId;
	var response;
	$.get( url, function(data) {
		$(".quiz-play").html(data);
		$('.answer-click').click(function() {
			if ($(this).hasClass('answer-click')) {
				var answerId = $(this).data('answer-id');
				$('.answer').removeClass('answer-click');
				quiz.validate(answerId);
			};
		});
	});
	return response;
};
Quiz.prototype.showData = function(data, el) {
	el.html(data);
};

Quiz.prototype.getNext = function() {
	if(undefined != typeof this.currentQuestion){
		this.olderQuestions.push(this.currentQuestion);
	}
	this.currentQuestion = this.questions.shift();
	return this.currentQuestion;
};

Quiz.prototype.validate = function(answerId) {
	var url = '/question/' + this.currentQuestion.id + '/validate/' + answerId;
	$.get( url, function(data) {
		$(".msg-response").html(data).show();
		setTimeout(
			Quiz.prototype.getDeezerTrack($(".msg-response > .alert").data('dizzer-id')), 
			1000
		);
		var btn = $('<div class="pull-right col-md-offset-8"><a href="#" class="next btn btn-primary btn-lg">Next</a></div>');
		setTimeout(
			function(){
				$("#answers").append(btn);
				$(".next").click(function() {
					var id = quiz.getNext().id
					data = quiz.getQuestion(id);
					quiz.showData(data, $(".quiz-play"));
				});
			},
			1500
		);

		
	});
};

Quiz.prototype.getDeezerTrack = function(music) {
	var player = '<iframe scrolling="no" frameborder="0" allowTransparency="true" src="http://www.deezer.com/br/plugins/player?autoplay=false&playlist=true&width=360&height=450&cover=true&type=tracks&id='+music+'&title=&format=vertical&app_id=123683" width="360" height="450"></iframe>';
	$(".msg-response").append(player);
};

$(document).ready(function(){
	quiz = new Quiz(quiz_id, questions);
	var data = quiz.getQuestion(quiz.getNext().id);
	quiz.showData(data, $(".quiz-play"));
});