describe('Remember Word Functionality', () => {
    beforeEach(() => {
        cy.visit('../index.html');
    });

    it('should add a word to the list of remembered words', () => {
        const word = 'This is the word of God to me today!';

        cy.get('#wordToRemember').type(word);

        cy.contains('button', 'Onthouden').click();

        cy.get('#listOfGodlyWords').contains('li', word).should('exist');

        cy.get('#wordToRemember').should('be.empty');
    });
});