<?php
    class CriarBanco{
        public static function criar(){
            $db = new Database();
        
            $sql = "CREATE TABLE `lobegestao`.`alq_uf` ( `id` INT NOT NULL AUTO_INCREMENT ,`origem` VARCHAR(2) NOT NULL , `AC` FLOAT NOT NULL , `AL` FLOAT NOT NULL , `AP` FLOAT NOT NULL , `AM` FLOAT NOT NULL , `BA` FLOAT NOT NULL , `CE` FLOAT NOT NULL , `DF` FLOAT NOT NULL , `ES` FLOAT NOT NULL , `GO` FLOAT NOT NULL , `MA` FLOAT NOT NULL , `MT` FLOAT NOT NULL , `MS` FLOAT NOT NULL , `MG` FLOAT NOT NULL , `PR` FLOAT NOT NULL , `PB` FLOAT NOT NULL , `PA` FLOAT NOT NULL , `PE` FLOAT NOT NULL , `PI` FLOAT NOT NULL , `RN` FLOAT NOT NULL , `RS` FLOAT NOT NULL , `RJ` FLOAT NOT NULL , `RO` FLOAT NOT NULL , `RR` FLOAT NOT NULL , `SC` FLOAT NOT NULL , `SE` FLOAT NOT NULL , `SP` FLOAT NOT NULL , `TO` FLOAT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            $sql = "CREATE TABLE `lobegestao`.`estados` ( `id` INT NOT NULL AUTO_INCREMENT , `sigla` VARCHAR(2) NOT NULL , `estado` VARCHAR(15) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            $sql .= "CREATE TABLE `lobegestao`.`empresas` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(32) NOT NULL , `tipo` VARCHAR(15) NOT NULL , `uf` VARCHAR(2) NOT NULL , `regime` VARCHAR(15) NOT NULL , `faturamento` VARCHAR(15) NOT NULL , `tareto` VARCHAR(3) NOT NULL , `tarego` VARCHAR(3) NOT NULL , `lei` VARCHAR(3) NOT NULL , `taregomex` VARCHAR(3) NOT NULL , `credita` VARCHAR(3) NOT NULL , `id_user` INT(5) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            $sql .= "CREATE TABLE `lobegestao`.`usuarios` ( `id` INT NOT NULL AUTO_INCREMENT , `cnpj` VARCHAR(32) NOT NULL , `nome` VARCHAR(32) NOT NULL , `email` VARCHAR(64) NOT NULL , `senha` VARCHAR(32) NOT NULL , `status` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
            $sql .= "CREATE TABLE `lobegestao`.`regras` ( `id` INT NOT NULL AUTO_INCREMENT , `regra` VARCHAR(256) NOT NULL , `campoalvo` VARCHAR(32) NOT NULL , `criterios` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";
        
            $sqltemp = "INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'AC',	'17',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'AL',	'12',	'17',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'AM',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'AP',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'BA',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'CE',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'DF',	'12',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'ES',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'17',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'GO',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'17',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'MA',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'MG',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'18',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'12',	'7',	'7',	'7',	'12',	'12',	'7',	'12',	'7')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'MS',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'17',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'MT',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'17',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'PA',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'17',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'PB',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'PE',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'PI',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'PR',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'7',	'7',	'7',	'7',	'7',	'7',	'18',	'12',	'7',	'7',	'7',	'12',	'12',	'7',	'12',	'7')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'RJ',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'20',	'7',	'7',	'7',	'12',	'12',	'7',	'12',	'7')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'RN',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'RO',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'17,5',	'12',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'RR',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'17',	'12',	'12',	'12',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'RS',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'12',	'7',	'7',	'7',	'18',	'12',	'7',	'12',	'7')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'SC',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'12',	'7',	'7',	'7',	'12',	'17',	'7',	'12',	'7')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'SE',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'18',	'12',	'12')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'SP',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'7',	'7',	'7',	'7',	'7',	'7',	'12',	'12',	'7',	'7',	'7',	'12',	'12',	'7',	'18',	'7')	;
            INSERT INTO `alq_uf`(`origem`, `AC`, `AL`, `AP`, `AM`, `BA`, `CE`, `DF`, `ES`, `GO`, `MA`, `MT`, `MS`, `MG`, `PR`, `PB`, `PA`, `PE`, `PI`, `RN`, `RS`, `RJ`, `RO`, `RR`, `SC`, `SE`, `SP`, `TO`) VALUES (	'TO',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'12',	'18')	;
            ";

            $sqltemp2 = "INSERT INTO `estados`(`sigla`, `estado`) VALUES ('GO','Goias');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('TO','Tocantins');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('BA','Bahia');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('MG','Minas Gerais');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('SP','São Paulo');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('RJ','Rio de Janeiro');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('ES','Espírito Santo');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('PR','Paraná');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('SC','Santa Catarina');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('RS','Rio Grande do Sul');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('MT','Mato Grosso');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('MS','Mato Grosso do Sul');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('DF','Distrito Federal');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('AM','Amazonas');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('RR','Roraima');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('AC','Acre');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('AP','Amapá');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('PA','Pará');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('RO','Rondônia');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('TO','Tocantins');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('AL','Alagoas');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('SE','Sergipe');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('PI','Piauí');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('RN','Rio Grande do Norte');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('PB','Paraíba');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('PE','Pernambuco');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('CE','Ceará');
            INSERT INTO `estados`(`sigla`, `estado`) VALUES ('INSERT INTO `estados`(`sigla`, `estado`) VALUES (','');
            ";

            $resul = $db->multi_query($sql);
        
            if($resul){
                echo("banco criado!");
            }
            else{
                echo("Erro");
            }
        }
    }