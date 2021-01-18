<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

      class Persona{

        private $nome;
        private $cognome;
        private $dataNascita;

        public function __construct($nome, $cognome, $dataNascita){
          $this -> setNome($nome);
          $this -> setCognome($cognome);
          $this -> setDataNascita($dataNascita);
        }

        public function getNome() {
            return $this -> nome;
        }
        public function setNome($nome) {
          if (gettype($nome) == 'string') {
            $this -> nome = $nome;
          } else {
            $this -> nome = 'non è una stringa';
          }

        }

        public function getCognome() {
            return $this -> cognome;
        }
        public function setCognome($cognome) {
          if (gettype($cognome) == 'string') {
            $this -> cognome = $cognome;
          } else {
            $this -> cognome = 'non è una stringa';
          }
        }

        public function getDataNascita() {
            return $this -> dataNascita;
        }
        public function setDataNascita($dataNascita) {
            $this -> dataNascita = $dataNascita;
        }

        public function __toString() {
            return
                'nome: ' . $this -> getNome() . '<br>'
                . 'cognome: ' . $this -> getCognome() . '<br>'
                . 'dataNascita: ' . $this -> getDataNascita();

        }
      }

      class Dipendente extends Persona{
        private $matricola;
        private $postazione;
        private $salario;

        public function __construct($nome, $cognome, $dataNascita, $matricola, $postazione, $salario) {
            parent::__construct($nome, $cognome, $dataNascita);
            $this -> setMatricola($matricola);
            $this -> setPostazione($postazione);
            $this -> setSalario($salario);
        }

        public function getMatricola() {
            return $this -> matricola;
        }
        public function setMatricola($matricola) {
            $this -> matricola = $matricola;
        }

        public function getPostazione() {
            return $this -> postazione;
        }
        public function setPostazione($postazione) {
            $this -> postazione = $postazione;
        }

        public function getSalario() {
            return $this -> salario;
        }
        public function setSalario($salario) {
          if (gettype($salario) == 'integer') {
            $this -> salario = $salario . ' €';
          } else {
            $this -> salario = 'non è un integer';
          }

        }

        public function __toString() {
          return parent::__toString() . '<br>'
              . 'matricola: ' . $this -> getMatricola() . '<br>'
              . 'postazione: ' . $this -> getPostazione() . '<br>'
              . 'salario: ' . $this -> getSalario();
        }
      }

      class Boss extends Persona{
        private $azienda;
        private $paritaIva;
        private $codFiscale;

        public function __construct($nome, $cognome, $dataNascita, $azienda, $paritaIva, $codFiscale) {
            parent::__construct($nome, $cognome, $dataNascita);
            $this -> setAzienda($azienda);
            $this -> setPartitaIva($paritaIva);
            $this -> setCodFiscale($codFiscale);
        }

        public function getAzienda() {
            return $this -> azienda;
        }
        public function setAzienda($azienda) {
            $this -> azienda = $azienda;
        }

        public function getPartitaIva() {
            return $this -> paritaIva;
        }
        public function setPartitaIva($paritaIva) {
            $this -> paritaIva = $paritaIva;
        }

        public function getCodFiscale() {
            return $this -> codFiscale;
        }
        public function setCodFiscale($codFiscale) {
            $this -> codFiscale = $codFiscale;
        }

        public function __toString() {
          return parent::__toString() . '<br>'
              . 'azienda: ' . $this -> getAzienda() . '<br>'
              . 'paritaIva: ' . $this -> getPartitaIva() . '<br>'
              . 'codFiscale: ' . $this -> getCodFiscale();
        }
      }

      $persona = new Persona(165, 565, '11/09/1992');

      echo $persona . '<br><br>';

      $dipendente = new Dipendente('Alessio', 'Garifo', '11/09/1992', 'al13ga5', '13-5', '1500');

      echo $dipendente . '<br><br>';

      $boss = new Boss('Alessio', 'Garifo', '11/09/1992', 'Pinco & co.', 16546894184, 'ggfle54d26e888p');

      echo $boss;


     ?>

  </body>
</html>

<!-- GOAL: php-oop-dipendenti
REPO:
creare 3 classi per rappresentare la seguente realta':
- persona
- dipendente
- boss
cercare inoltre di sciegliere alcune variabili di istanza (max 3 o 4 per classe) che possono avere senso in questa realta' e decidere le relazione di parantela (chi estende chi);
per ogni classe definire eventuale classe padre, variabili di istanza, costruttore, proprieta' e toString;
instanziando le varie classi provare a stampare cercando di ottenere un log sensato -->
