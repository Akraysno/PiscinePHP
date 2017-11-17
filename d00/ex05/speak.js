var formAction = 0;

function form(event) {
	event.preventDefault();
	var question = document.querySelector("#form input[type='text']").value;
	var reponse = document.querySelector("#reponse");
	switch (formAction) {
		case 0:
			if (question.indexOf("Non") == 0) {
				reponse.innerHTML = "Quel est ton login alors ?";
				formAction = 1;
			} else if (question.indexOf("Oui") == 0) {
				reponse.innerHTML = "Oh ! Tu aime bien 42 ?";
				formAction = 4;
			} else {
				reponse.innerHTML = "Allez bonne chance pour la suite ! Peut-être à la prochaine !";
				formAction = 6;
			}
			break;
		case 1:
			reponse.innerHTML = question + ", tu fais la piscine PHP ?";
			formAction = 2;
			break;
		case 2:
			if (question.indexOf("Non") == 0) {
				reponse.innerHTML = "Ah, tu l'as déjà terminée ?";
				formAction = 3;
			} else if (question.indexOf("Oui") == 0) {
				reponse.innerHTML = "Tu as réussis à la valider ?";
				formAction = 5;
			} else {
				reponse.innerHTML = "Allez bonne chance pour la suite ! Peut-être à la prochaine !";
				formAction = 6;
			}
			break;
		case 3:
			if (question.indexOf("Non") == 0) {
				reponse.innerHTML = "Oh ! C'est dommage ! J'espère que tu renteras ta chance !";
				formAction = 6;
			} else if (question.indexOf("Oui") == 0) {
				reponse.innerHTML = "C'est cool ça !";
				formAction = 6;
			} else {
				reponse.innerHTML = "Allez bonne chance pour la suite ! Peut-être à la prochaine !";
				formAction = 6;
			}
			break;
		case 4:
			if (question.indexOf("Non") == 0) {
				reponse.innerHTML = "Oh ! C'est bien dommage ! C'est plutôt sympa pourtant";
				formAction = 6;
			} else if (question.indexOf("Oui") == 0) {
				reponse.innerHTML = "C'est vrai que c'est sympa ! Quel est ton login ?";
				formAction = 1;
			} else {
				reponse.innerHTML = "Allez bonne chance pour la suite ! Peut-être à la prochaine !";
				formAction = 6;
			}
			break;
		case 5:
			if (question.indexOf("Non") == 0) {
				reponse.innerHTML = "Oh ! Tu es en train de la faire ?";
				formAction = 3;
			} else if (question.indexOf("Oui") == 0) {
				reponse.innerHTML = "Félicitation !";
				formAction = 6;
			} else {
				reponse.innerHTML = "Allez bonne chance pour la suite ! Peut-être à la prochaine !";
				formAction = 6;
			}
			break;
		case 6:
			reponse.innerHTML = "Allez bonne chance pour la suite ! Peut-être à la prochaine !";
			formAction = 6;
			break;
	}
	document.querySelector("#form input[type='text']").value = " ";
}

window.onload = function () {
	document.querySelector("#form").addEventListener("submit", form);
}