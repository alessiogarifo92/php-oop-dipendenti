<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    class Person
    {
        private $name;
        private $lastname;
        private $dateOfBirth;
        protected $securyLvl;
        public function __construct($name, $lastname, $dateOfBirth, $securyLvl)
        {
            $this -> setName($name);
            $this -> setLastname($lastname);
            $this -> setDateOfBirth($dateOfBirth);
            $this -> setSecuryLvl($securyLvl);
        }
        public function getName()
        {
            return $this -> name;
        }
        public function setName($name)
        {
            if (strlen($name) <= 3) {
                throw new MoreThanThree('Name must have more than 3 letters<br>');
            }
            $this -> name = $name;
        }
        public function getLastname()
        {
            return $this -> lastname;
        }
        public function setLastname($lastname)
        {
            $this -> lastname = $lastname;
        }
        public function getFullname()
        {
            return $this -> getName() . ' ' . $this -> getLastname();
        }
        public function getDateOfBirth()
        {
            return $this -> dateOfBirth;
        }
        public function setDateOfBirth($dateOfBirth)
        {
            $this -> dateOfBirth = $dateOfBirth;
        }
        public function getSecuryLvl()
        {
            return $this -> securyLvl;
        }
        public function setSecuryLvl($securyLvl)
        {
            $this -> securyLvl = $securyLvl;
        }
        public function __toString()
        {
            return
            'name: ' . $this -> getName() . '<br>'
            . 'lastname: ' . $this -> getLastname() . '<br>'
            . 'dateOfBirth: ' . $this -> getDateOfBirth() . '<br>'
            . 'securyLvl: ' . $this -> getSecuryLvl();
        }
    }
    // VERSIONE 1
    class Employee extends Person
    {
        private $ral;
        private $mainTask;
        private $idCode;
        private $dateOfHiring;
        public function __construct(
            $name,
            $lastname,
            $dateOfBirth,
            $securyLvl,
            $ral,
            $mainTask,
            $idCode,
            $dateOfHiring
        ) {
            parent::__construct($name, $lastname, $dateOfBirth, $securyLvl);
            $this -> setRal($ral);
            $this -> setMainTask($mainTask);
            $this -> setIdCode($idCode);
            $this -> setDateOfHiring($dateOfHiring);
        }

        public function setSecuryLvl($securyLvl)
        {
          if ($securyLvl >= 6 && $securyLvl <= 10) {
            throw new YouAreEmployee("sei un dipendente");
          }
            $this -> securyLvl = $securyLvl;
        }

        public function getRal()
        {
            return $this -> $ral;
        }
        public function setRal($ral)
        {
            if ($ral < 10000 || $ral > 100000) {
                throw new BetweenRange('Must be between 10.000 and 100.000<br>');
            }
            $this -> ral = $ral;
        }
        public function getMainTask()
        {
            return $this -> $mainTask;
        }
        public function setMainTask($mainTask)
        {
            $this -> mainTask = $mainTask;
        }
        public function getIdCode()
        {
            return $this -> $idCode;
        }
        public function setIdCode($idCode)
        {
            $this -> idCode = $idCode;
        }
        public function getDateOfHiring()
        {
            return $this -> $dateOfHiring;
        }
        public function setDateOfHiring($dateOfHiring)
        {
            $this -> dateOfHiring = $dateOfHiring;
        }
        public function __toString()
        {
            return parent::__toString() . '<br>'
                . 'ral: ' . $this -> ral . '<br>'
                . 'mainTask: ' . $this -> mainTask . '<br>'
                . 'idCode: ' . $this -> idCode . '<br>'
                . 'dateOfHiring: ' . $this -> dateOfHiring . '<br>';
        }
    }
    class Boss extends Employee
    {
        private $profit;
        private $vacancy;
        private $sector;
        private $employees;
        public function __construct(
            $name,
            $lastname,
            $dateOfBirth,
            $securyLvl,
            $ral,
            $mainTask,
            $idCode,
            $dateOfHiring,
            $profit,
            $vacancy,
            $sector,
            $employees = []
        )
        {
            parent::__construct(
                $name,
                $lastname,
                $dateOfBirth,
                $securyLvl,
                $ral,
                $mainTask,
                $idCode,
                $dateOfHiring
            );
            $this -> setProfit($profit);
            $this -> setVacancy($vacancy);
            $this -> setSector($sector);
            $this -> setEmployees($employees);
        }

        public function setSecuryLvl($securyLvl)
        {
          if ($securyLvl > 1 && $securyLvl < 6) {
            throw new YouAreBoss("sei il boss");
          }
            $this -> securyLvl = $securyLvl;
        }

        public function getProfit()
        {
            return $this -> profit;
        }
        public function setProfit($profit)
        {
            $this -> profit = $profit;
        }
        public function getVacancy()
        {
            return $this -> vacancy;
        }
        public function setVacancy($vacancy)
        {
            $this -> vacancy = $vacancy;
        }
        public function getSector()
        {
            return $this -> sector;
        }
        public function setSector($sector)
        {
            $this -> sector = $sector;
        }
        public function getEmployees()
        {
            return $this -> employees;
        }
        public function setEmployees($employees)
        {
          if (empty($employees)) {
            throw new CheckNumberEmployees("non hai dipendenti");
          }
            $this -> employees = $employees;
        }
        public function __toString()
        {
          return parent::__toString() . '<br>'
                . 'profit: ' . $this -> getProfit() . '<br>'
                . 'vacancy: ' . $this -> getVacancy() . '<br>'
                . 'sector: ' . $this -> getSector() . '<br>'
                . 'employees:<br>' . $this -> getEmpsStr() . '<br>';
          }
        private function getEmpsStr()
        {
            $str = ''; //ad ogni ciclo creiamo variabile di un employee
            for ($x=0;$x<count($this -> getEmployees());$x++) {
                $emp = $this -> getEmployees()[$x];
                $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
                $str .= ($x + 1) . ': ' . $fullname . '<br>';
            }
            // var_dump($str); die();
            return $str;
        }
    }

    class MoreThanThree extends Exception{}
    class BetweenRange extends Exception{}
    class YouAreEmployee extends Exception{}
    class YouAreBoss extends Exception{}
    class CheckNumberEmployees extends Exception{}


    ?>
      <h1>Person</h1>
    <?php

    try {
        $person = new Person('Alessio', 'Garifo', '11/09/1992', 16546);
        echo $person . '<br><br>';
    } catch (MoreThanThree $e) {
        echo 'Errore : Nome deve avere piu di 3 lettere<br>';
    }


    // try {
    //   $employee = new Employee('Al', 'Garifo', '11/09/1992', 6, 10555, 'wegwe', 'gsdgwg', 'gwegweg');
    //     echo $employee . '<br><br>';
    // } catch (Exception $e) {
    //
    //       echo 'Error Boss: ' . $e-> getMessage() . '<br>';
    //
    // }
     //////////// N.B in questo modo si puo lasciare le exception e a seconda dell errore prende messaggio direttamente da if e lo inserisce////////////////

     ?>

      <h1>Employees</h1>

     <?php

    try {
      $employee = new Employee('Alds', 'Garifo', '11/09/1992', 5, 10555, 'wegwe', 'gsdgwg', 'gwegweg');
      echo $employee . '<br><br>';
    } catch (MoreThanThree $e) {
        echo 'Errore : Nome deve avere piu di 3 lettere<br>';
    } catch (BetweenRange $e) {
        echo 'Errore : Ral al di fuori di range 10.000-100.000<br>';
    } catch (YouAreEmployee $e) {
      echo "Sei il boss<br>";
    }

    try {
      $employee2 = new Employee('Beppe', 'Colia', '11/09/1992', 5, 10555, 'wegwe', 'gsdgwg', 'gwegweg');
      echo $employee2 . '<br><br>';
    } catch (MoreThanThree $e) {
        echo 'Errore : Nome deve avere piu di 3 lettere<br>';
    } catch (BetweenRange $e) {
        echo 'Errore : Ral al di fuori di range 10.000-100.000<br>';
    } catch (YouAreEmployee $e) {
      echo "Sei il boss<br>";
    }


    // catch (MoreThanThree | BetweenRange $a) { //possono essere usati per errori singoli ma se entrambi errori   presenti, va a prendere scritta errore del primo(in questo caso che deve avere piu di 3 lettere)
    //       echo 'Errore : Nome deve avere piu di 3 lettere<br>' .
    //       'Ral al di fuori di range 10.000-100.000<br>';
    // }

    ?>
      <h1>Boss</h1>
    <?php

    try {
      $boss = new Boss('Alessio', 'Garifo', '11/09/1992', 8, 10005, 'wegwe', 'gsdgwg', 'gwegweg', '1655', 'fefeqfqe', 'faefef', [$employee, $employee2]);//errore era nell array perche abbiamo fatto funzione che restituisce la variabile con fullname di ogni employee
      echo $boss;
    } catch (YouAreBoss $e) {
      echo "sei un dipendente";
    }
    catch (CheckNumberEmployees $e) {
      echo "Non hai dipendenti";
    }




     ?>

  <!-- GOAL: sulla base dell'esercizio di ieri (vedi correzione qui su slack) aggiungere i seguenti vincoli di integrita':
  - nomi e cognomi devono essere di >3 caratteri
  - i livelli di sicurezza devono essere [1;5] per i dipendenti e [6;10] per i boss
  - ral employee [10.000;100.000]
  - non puo' esistere boss senza dipendenti
  Durante la fase di test, utilizzare il costrutto try-catch per gestire l'errore e informare l'utente -->

  </body>
</html>
