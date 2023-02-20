DROP DATABASE IF EXISTS autoecole;

CREATE DATABASE IF NOT EXISTS autoecole;
USE autoecole;
# -----------------------------------------------------------------------------
#       TABLE : ETABLISSEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETABLISSEMENT
 (
   DEGRE CHAR(30) NOT NULL  ,
   NOM CHAR(50) NULL  ,
   ADRESSE CHAR(50) NULL  
   , PRIMARY KEY (DEGRE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ETUDIANT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ETUDIANT
 (
   N_CLIENT INTEGER NOT NULL  ,
   DEGRE CHAR(30) NOT NULL  ,
   NIVEAU_ETUDE CHAR(20) NULL  ,
   REDUCTION CHAR(3) NULL  ,
   NOM_CLIENT CHAR(30) NULL  ,
   PRENOM_CLIENT CHAR(30) NULL  ,
   ADRESSE_CLIENT CHAR(50) NULL  ,
   DATE_DE_NAISSANCE DATE NULL  ,
   TEL INTEGER NULL  ,
   DATE_INSCRIPTION DATE NULL  ,
   MODE_FACTURATION CHAR(30) NULL  
   , PRIMARY KEY (N_CLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ETUDIANT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ETUDIANT_ETABLISSEMENT
     ON ETUDIANT (DEGRE ASC);

# -----------------------------------------------------------------------------
#       TABLE : EXAM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EXAM
 (
   ID_EXAM INTEGER NOT NULL  ,
   CODE_TYPE INTEGER NOT NULL  
   , PRIMARY KEY (ID_EXAM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EXAM
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EXAM_TYPE_EXAM
     ON EXAM (CODE_TYPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : VEHICULE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VEHICULE
 (
   N_VEHICULE INTEGER NOT NULL  ,
   CODE_MODELE INTEGER NOT NULL  ,
   N_IMMATRICULATION CHAR(20) NULL  ,
   DATE_ACHAT DATE NULL  ,
   NB_KM_INITIAL INTEGER NULL  
   , PRIMARY KEY (N_VEHICULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VEHICULE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VEHICULE_MODELE
     ON VEHICULE (CODE_MODELE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   N_CLIENT INTEGER NOT NULL  ,
   NOM_CLIENT CHAR(30) NULL  ,
   PRENOM_CLIENT CHAR(30) NULL  ,
   ADRESSE_CLIENT CHAR(50) NULL  ,
   DATE_DE_NAISSANCE DATE NULL  ,
   TEL INTEGER NULL  ,
   DATE_INSCRIPTION DATE NULL  ,
   MOT_DE_PASSE CHAR(50) NULL ,
   MODE_FACTURATION CHAR(30) NULL  
   , PRIMARY KEY (N_CLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : MONITEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MONITEUR
 (
   N_MONITEUR INTEGER NOT NULL  ,
   NOM_MONTEUR CHAR(30) NULL  ,
   DATE_EMBAUCHE DATE NULL  
   , PRIMARY KEY (N_MONITEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : LECON
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LECON
 (
   N_LECON INTEGER NOT NULL  ,
   DATE_LECON DATE NULL  ,
   HEURE_LECON CHAR(5) NULL  ,
   TARIF_HEURE CHAR(5) NULL  
   , PRIMARY KEY (N_LECON) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SALARIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SALARIE
 (
   N_CLIENT INTEGER NOT NULL  ,
   NOM_ENTREPRISE CHAR(32) NULL  ,
   NOM_CLIENT CHAR(30) NULL  ,
   PRENOM_CLIENT CHAR(30) NULL  ,
   ADRESSE_CLIENT CHAR(50) NULL  ,
   DATE_DE_NAISSANCE DATE NULL  ,
   TEL INTEGER NULL  ,
   DATE_INSCRIPTION DATE NULL  ,
   MODE_FACTURATION CHAR(30) NULL  
   , PRIMARY KEY (N_CLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : MODELE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MODELE
 (
   CODE_MODELE INTEGER NOT NULL  ,
   NOM_MODELE CHAR(50) NULL  ,
   ANNEE_MODELE DATE NULL  ,
   TYPE_DE_CONSO CHAR(32) NULL  
   , PRIMARY KEY (CODE_MODELE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TYPE_EXAM
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TYPE_EXAM
 (
   CODE_TYPE INTEGER NOT NULL  ,
   LIBELLE_TYPE CHAR(40) NULL  
   , PRIMARY KEY (CODE_TYPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : EXAM_PERMIS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EXAM_PERMIS
 (
   N_CLIENT INTEGER NOT NULL  ,
   ID_EXAM INTEGER NOT NULL  ,
   DATE_P DATE NULL  ,
   HEURE_P TIME NULL  ,
   RESULTAT_P CHAR(15) NULL  
   , PRIMARY KEY (N_CLIENT,ID_EXAM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EXAM_PERMIS
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EXAM_PERMIS_CLIENT
     ON EXAM_PERMIS (N_CLIENT ASC);

CREATE  INDEX I_FK_EXAM_PERMIS_EXAM
     ON EXAM_PERMIS (ID_EXAM ASC);

# -----------------------------------------------------------------------------
#       TABLE : ULTILISER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ULTILISER
 (
   N_LECON INTEGER NOT NULL  ,
   N_VEHICULE INTEGER NOT NULL  
   , PRIMARY KEY (N_LECON,N_VEHICULE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ULTILISER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ULTILISER_LECON
     ON ULTILISER (N_LECON ASC);

CREATE  INDEX I_FK_ULTILISER_VEHICULE
     ON ULTILISER (N_VEHICULE ASC);

# -----------------------------------------------------------------------------
#       TABLE : PLANNING
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PLANNING
 (
   N_LECON INTEGER NOT NULL  ,
   N_CLIENT INTEGER NOT NULL  ,
   N_MONITEUR INTEGER NOT NULL  ,
   CODE_MODELE INTEGER NOT NULL  ,
   DATE_HEURE_DEBUT DATETIME NULL  ,
   DATE_HEURE_FIN DATETIME NULL  
   , PRIMARY KEY (N_LECON,N_CLIENT,N_MONITEUR,CODE_MODELE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PLANNING
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PLANNING_LECON
     ON PLANNING (N_LECON ASC);

CREATE  INDEX I_FK_PLANNING_CLIENT
     ON PLANNING (N_CLIENT ASC);

CREATE  INDEX I_FK_PLANNING_MONITEUR
     ON PLANNING (N_MONITEUR ASC);

CREATE  INDEX I_FK_PLANNING_MODELE
     ON PLANNING (CODE_MODELE ASC);

# -----------------------------------------------------------------------------
#       TABLE : EXAM_CODE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EXAM_CODE
 (
   ID_EXAM INTEGER NOT NULL  ,
   N_CLIENT INTEGER NOT NULL  ,
   DATE_C DATE NULL  ,
   HEURE_C TIME NULL  ,
   RESULTAT_C CHAR(15) NULL  
   , PRIMARY KEY (ID_EXAM,N_CLIENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EXAM_CODE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EXAM_CODE_EXAM
     ON EXAM_CODE (ID_EXAM ASC);

CREATE  INDEX I_FK_EXAM_CODE_CLIENT
     ON EXAM_CODE (N_CLIENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : H_N_LECON_LECON
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS H_N_LECON_LECON
 (
   N_LECON INTEGER NOT NULL  ,
   DATE_HISTO DATE NOT NULL  
   , PRIMARY KEY (N_LECON,DATE_HISTO) 
 ) 
 comment = "Table d'historisation des modifications de la table LECON";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE H_N_LECON_LECON
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_H_N_LECON_LECON_LECON
     ON H_N_LECON_LECON (N_LECON ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_ETABLISSEMENT (DEGRE)
      REFERENCES ETABLISSEMENT (DEGRE) ;


ALTER TABLE ETUDIANT 
  ADD FOREIGN KEY FK_ETUDIANT_CLIENT (N_CLIENT)
      REFERENCES CLIENT (N_CLIENT) ;


ALTER TABLE EXAM 
  ADD FOREIGN KEY FK_EXAM_TYPE_EXAM (CODE_TYPE)
      REFERENCES TYPE_EXAM (CODE_TYPE) ;


ALTER TABLE VEHICULE 
  ADD FOREIGN KEY FK_VEHICULE_MODELE (CODE_MODELE)
      REFERENCES MODELE (CODE_MODELE) ;


ALTER TABLE SALARIE 
  ADD FOREIGN KEY FK_SALARIE_CLIENT (N_CLIENT)
      REFERENCES CLIENT (N_CLIENT) ;


ALTER TABLE EXAM_PERMIS 
  ADD FOREIGN KEY FK_EXAM_PERMIS_CLIENT (N_CLIENT)
      REFERENCES CLIENT (N_CLIENT) ;


ALTER TABLE EXAM_PERMIS 
  ADD FOREIGN KEY FK_EXAM_PERMIS_EXAM (ID_EXAM)
      REFERENCES EXAM (ID_EXAM) ;


ALTER TABLE ULTILISER 
  ADD FOREIGN KEY FK_ULTILISER_LECON (N_LECON)
      REFERENCES LECON (N_LECON) ;


ALTER TABLE ULTILISER 
  ADD FOREIGN KEY FK_ULTILISER_VEHICULE (N_VEHICULE)
      REFERENCES VEHICULE (N_VEHICULE) ;


ALTER TABLE PLANNING 
  ADD FOREIGN KEY FK_PLANNING_LECON (N_LECON)
      REFERENCES LECON (N_LECON) ;


ALTER TABLE PLANNING 
  ADD FOREIGN KEY FK_PLANNING_CLIENT (N_CLIENT)
      REFERENCES CLIENT (N_CLIENT) ;


ALTER TABLE PLANNING 
  ADD FOREIGN KEY FK_PLANNING_MONITEUR (N_MONITEUR)
      REFERENCES MONITEUR (N_MONITEUR) ;


ALTER TABLE PLANNING 
  ADD FOREIGN KEY FK_PLANNING_MODELE (CODE_MODELE)
      REFERENCES MODELE (CODE_MODELE) ;


ALTER TABLE EXAM_CODE 
  ADD FOREIGN KEY FK_EXAM_CODE_EXAM (ID_EXAM)
      REFERENCES EXAM (ID_EXAM) ;


ALTER TABLE EXAM_CODE 
  ADD FOREIGN KEY FK_EXAM_CODE_CLIENT (N_CLIENT)
      REFERENCES CLIENT (N_CLIENT) ;


ALTER TABLE H_N_LECON_LECON 
  ADD FOREIGN KEY FK_H_N_LECON_LECON_LECON (N_LECON)
      REFERENCES LECON (N_LECON) ;

