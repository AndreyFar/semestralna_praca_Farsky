var currentQuestion = null;

function toggleAnswer(id, questionElement) {
    var answer = document.getElementById(id);

    // Ak klikneme na tú istú otázku, skryj odpoveď
    if (currentQuestion !== null && currentQuestion.question === questionElement) {
        answer.style.display = 'none';
        questionElement.style.color = 'white';
        answer.style.color = 'white'; // Nastavi farbu odpovede na bielu
        currentQuestion = null;
        return;
    }

    // Ak existuje aktuálna otázka, skryj jej odpoveď
    if (currentQuestion !== null) {
        currentQuestion.answer.style.display = 'none';
        currentQuestion.question.style.color = 'white';
        currentQuestion.answer.style.color = 'white'; // Nastavi farbu odpovede na bielu
    }

    // Zobraziť odpoveď pre aktuálnu otázku
    answer.style.display = 'block';
    questionElement.style.color = 'orange';

    // Nastavi farbu odpovede na bielu
    answer.style.color = 'white';

    // Aktualizovať aktuálnu otázku
    currentQuestion = {
        question: questionElement,
        answer: answer
    };
}