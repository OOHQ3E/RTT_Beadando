describe('Register a new user', () => {
    it('Visit main page', () => {
        cy.visit('http://127.0.0.1:8000/')
    })
    it('Register ', function () {
        cy.get('svg').click()
        cy.get('[id=Register]').click()
        cy.contains("Register")
        cy.get('#name').type("Test User")
        cy.get('#email').type("test@email.com")
        cy.get('#password').type("testpassword")
        cy.get('#password-confirm').type("testpassword")
        cy.get('[id=RegisterButtonSend]').click()
    });
})
describe('Logs in a new user with wrong login credentials', () => {
    it('Visit main page', () => {
        cy.visit('http://127.0.0.1:8000/')
    })
    it('Login ', function () {
        cy.get('svg').click()
        cy.get('[id=Login]').click()
        cy.contains("Bejelentkezés")
        cy.get('#email').type("rossz@email.com")
        cy.get('#password').type("rossz")
        cy.get('[id=LoginButtonSend]').click()
        cy.contains('auth.failed')
    });
})

describe('Logs in a new user with correct credentials', () => {
    it('Visit main page', () => {
        cy.visit('http://127.0.0.1:8000/')
    })
    it('Login ', function () {
        cy.get('svg').click()
        cy.get('[id=Login]').click()
        cy.contains("Bejelentkezés")
        cy.get('#email').type("test@email.com")
        cy.get('#password').type("testpassword")
        cy.get('[id=LoginButtonSend]').click()
    });
})
describe('Add a new question with 2 options to database correctly', () => {
    it('Add a new question with 2 options to database correctly', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('svg').click()
        cy.get('[id=Login]').click()
        cy.contains("Bejelentkezés")
        cy.get('#email').type("test@email.com")
        cy.get('#password').type("testpassword")
        cy.get('[id=LoginButtonSend]').click()

        cy.get("#AddNewQuestion").click()
        cy.get('#QuestionTitle').type("test question title")
        cy.get("#Ans1").type("test answer 1")
        cy.get("#Ans2").type("test answer 2")
        cy.get("#correct").select("2. válasz")
        cy.get('#Submit').click()

    });
})
describe('Add a new question with 2 options to database with too long input', () => {
    it('Add a new question with 2 options to database with too long input', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('svg').click()
        cy.get('[id=Login]').click()
        cy.contains("Bejelentkezés")
        cy.get('#email').type("test@email.com")
        cy.get('#password').type("testpassword")
        cy.get('[id=LoginButtonSend]').click()

        cy.get("#AddNewQuestion").click()
        cy.get('#QuestionTitle').type("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa")
        cy.get("#Ans1").type("test answer 1")
        cy.get("#Ans2").type("test answer 2")
        cy.get("#correct").select("2. válasz")
        cy.get('#Submit').click()
        cy.get('#error').contains("A mezők legfeljebb 255 karakter hosszúak lehetnek!")

    });
})
describe('Add a new question with 3 options to database', () => {
    it('Add a new question with 3 options to database', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('svg').click()
        cy.get('[id=Login]').click()
        cy.contains("Bejelentkezés")
        cy.get('#email').type("test@email.com")
        cy.get('#password').type("testpassword")
        cy.get('[id=LoginButtonSend]').click()

        cy.get("#AddNewQuestion").click()
        cy.get('#QuestionTitle').type("test question with 3 options")
        cy.get("#Ans1").type("test answer 1")
        cy.get("#Ans2").type("test answer 2")
        cy.get("#Ans3").type("test answer 3")
        cy.get("#correct").select("2. válasz")
        cy.get('#Submit').click()

    });
})
describe('Opens edit and edit 1st answer', () => {
    it('Opens edit and edit 1st answer', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('svg').click()
        cy.get('[id=Login]').click()
        cy.contains("Bejelentkezés")
        cy.get('#email').type("test@email.com")
        cy.get('#password').type("testpassword")
        cy.get('[id=LoginButtonSend]').click()
        cy.get("#modify").first().click()
        cy.get("#Edit").contains("Kérdés szerkesztése")
        cy.get("#Ans1").clear().type("modified 1st answer")
        cy.get("#submit").click()
        cy.get("#responseText").contains("Sikeres szerkesztés!")
    });
})

describe('Opens edit and edit 1st answer', () => {
    it('Opens edit and edit 1st answer', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get('svg').click()
        cy.get('[id=Login]').click()
        cy.contains("Bejelentkezés")
        cy.get('#email').type("test@email.com")
        cy.get('#password').type("testpassword")
        cy.get('[id=LoginButtonSend]').click()
        cy.get("#delete").first().click()
        cy.get("#responseText").contains("Sikeres törlés!")
    });
})
describe('Tries to start a quiz with a name length less then 3', () => {
    it('Tries to start a quiz with a name length less then 3', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get("#name").type("aa")
        cy.get("#StartQuiz").click()
        cy.get("#Error").contains("A név legalább 3 karakter hosszú legyen!")
    });
})
describe('Tries to start a quiz with a name length more than 25', () => {
    it('Tries to start quiz with name "aaaaaaaaaaaaaaaaaaaaaaaaaa"', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get("#name").type("aaaaaaaaaaaaaaaaaaaaaaaaaa")
        cy.get("#StartQuiz").click()
        cy.get("#Error").contains("A név legfeljebb 25 karakter hosszú lehet!")
    });
})
describe('Starts a quiz', () => {
    it('Starts a quiz', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get("#name").type("Tester")
        cy.get("#StartQuiz").click()
        cy.url("http://127.0.0.1:8000/quiz")
    });
})
describe.only('Starts a quiz', () => {
    it('Does the quiz', () => {
        cy.visit('http://127.0.0.1:8000/')
        cy.get("#name").type("Tester")
        cy.get("#StartQuiz").click()
        cy.url("http://127.0.0.1:8000/quiz")
        cy.get('[type="radio"]').eq(0).click()
        cy.get('[type="radio"]').eq(4).click()
        cy.get('[type="radio"]').eq(-1).click()
        cy.get("#FinishQuiz").click()
        cy.get("#Leaderboard").contains("Ranglista")

    });
})
