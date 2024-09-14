describe('Remember Word Functionality', () => {
    beforeEach(() => {
        // Visit your application before each test
        cy.visit('../index.html');
        
        // Clear local storage before each test to have a clean state
        cy.clearLocalStorage();
    });

    it('should add a word to the list of remembered words', () => {
        const word = 'Test Word';

        // Type the word into the input field
        cy.get('#wordToRemember').type(word);

        // Click the remember button
        cy.contains('button', 'Onthouden').click();

        // Check if the word appears in the list
        cy.get('#listOfGodlyWords').contains('li', word).should('exist');
    });
});