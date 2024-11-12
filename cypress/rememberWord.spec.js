describe('Remember Word Functionality', () => {
    beforeEach(() => {
        cy.visit('../index.html');
    });

    it('should add a word to the list of remembered words', () => {
        const title = 'The works You have provided to me give me energy for they harmonise with who I am';
        const manner = `Willy told me she has seen a sermon by Orlando Botterblei on this subject`;
        const context = `I am unique; You've created me in a (very) special way. Therefore, certain works (things to do) resonate with me and certain works do (definitely) not. 
        It's like playing the electric guitar. Certain songs are fit for playing on the electric guitar. Certain songs are not guitar-made.`;

        cy.get('#titleInput').type(title);
        cy.get('#mannerInput').type(manner);
        cy.get('#contextInput').type(context)

        cy.contains('button', 'Oprichten').click();

        cy.get('#listOfStones').contains('li', title).should('exist');

        cy.get('#titleInput').should('be.empty');
        cy.get('#mannerInput').should('be.empty');
        cy.get('#contextInput').should('be.empty');
    });
});