Feature: Entrar en Panel de Log In
  Para Poder Iniciar Sesion
  Como El Usuario Zonapro
  Quiero Verificar el proceso de autentificacion

  Scenario: Pagina de Panel Administrativo
    When I go to "PanelAdministrativo"
    Then I should see "Login"