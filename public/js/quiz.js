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

Quiz.prototype.validate = function(questionId, answerId) {
	var url = '/quiz/' + this.currentQuestion.id + '/validate/' + answerId;
	$.get( url, function(data) {
		$(".quiz-play").html(data);
	});
};

$(document).ready(function(){
	var quiz = new Quiz(quiz_id, questions);
	var data = quiz.getQuestion(quiz.getNext().id);
	quiz.showData(data, $(".quiz-play"));
	$('.answer').click(function() {
		var answerId = $(this).data('answerId');

	});
});