describe('Pruebas E2E de la Calculadora', () => {

  it('Debe realizar una suma correctamente (7 + 8 = 15)', () => {
    cy.visit('http://localhost:62022/Calculadora.html');
    cy.get('#btn-7').click();
    cy.get('#btn-sumar').click();
    cy.get('#btn-8').click();
    cy.get('#btn-igual').click();
    cy.get('#resultado').should('have.text', '15');
  });

  it('Debe limpiar la pantalla con el botón AC', () => {
    cy.get('#btn-ac').click();
    cy.get('#resultado').should('have.text', '');
  });

  it('Debe realizar una resta correctamente (9 - 4 = 5)', () => {
    cy.get('#btn-9').click();
    cy.get('#btn-restar').click();
    cy.get('#btn-4').click();
    cy.get('#btn-igual').click();
    cy.get('#resultado').should('have.text', '5');
  });

  it('Debe realizar una multiplicación correctamente (6 x 7 = 42)', () => {
    cy.get('#btn-6').click();
    cy.get('#btn-multiplicar').click();
    cy.get('#btn-7').click();
    cy.get('#btn-igual').click();
    cy.get('#resultado').should('have.text', '42');
  });

  it('Debe realizar una división correctamente (8 ÷ 2 = 4)', () => {
    cy.get('#btn-8').click();
    cy.get('#btn-dividir').click();
    cy.get('#btn-2').click();
    cy.get('#btn-igual').click();
    cy.get('#resultado').should('have.text', '4');
  });

  // NUEVA PRUEBA INDIVIDUAL PARA LA GUÍA 10
  it('Debería realizar una multiplicación de dos dígitos (5 * 5 = 25)', () => {
    cy.get('#btn-5').click();
    cy.get('#btn-multiplicar').click();
    cy.get('#btn-5').click();
    cy.get('#btn-igual').click();
    cy.get('#resultado').should('have.text', '25');
  });

});