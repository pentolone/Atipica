<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anagrafica".
 *
 * @property int $id
 * @property string $cognome
 * @property string $nome
 * @property string $sesso
 * @property string $indirizzo
 * @property string $citta
 * @property int $id_provincia
 * @property int $id_cittadinanza
 * @property int $id_stato_nascita
 * @property string $cap
 * @property string $luogo_nascita
 * @property string $codice_catastale
 * @property string $data_nascita
 * @property string $cf
 * @property string $ts
 * @property string $telefono
 * @property string $cellulare
 * @property string $telefono_rif
 * @property string $email
 * @property int $id_tipo_doc
 * @property string $n_doc
 * @property string $data_ril
 * @property string $data_exp
 * @property int $id_luogo_rilascio
 * @property int $id_stato_civile
 * @property int $id_professione
 * @property int $id_titolo_studio
 * @property int $id_classificazione
 * @property string $data
 * @property string $utente
 */
class Anagrafica extends \yii\db\ActiveRecord
{
	
	public $nomeProvincia=null;
	public $descrizioneTipoDocumento;
	public $descrizioneCittadinanza;
	public $descrizioneStatoNascita;
	public $luogoRilascio;
	public $descrizioneStatoCivile;
	public $descrizioneProfessione;
	public $descrizioneTitoloStudio;
	public $descrizioneClassificazione;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anagrafica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cognome', 'nome', 'sesso', 'indirizzo', 'citta', 'id_provincia', 'id_stato_nascita', 'cap', 'luogo_nascita', 'data_nascita', 'id_tipo_doc', 'n_doc', 'data_ril', 'data_exp'], 'required'],
            [['id_provincia', 'id_cittadinanza', 'id_stato_nascita', 'id_tipo_doc', 'id_luogo_rilascio', 'id_stato_civile', 'id_professione', 'id_titolo_studio', 'id_classificazione'], 'integer'],
            [['data_nascita', 'data_ril', 'data_exp', 'data'], 'safe'],
            [['cognome', 'nome', 'indirizzo', 'citta', 'luogo_nascita'], 'string', 'max' => 100],
            [['nomeProvincia', 'descrizioneTipoDocumento', 'descrizioneCittadinanza', 
             'descrizioneStatoNascita', 'luogoRilascio', 'descrizioneStatoCivile',
             'descrizioneProfessione','descrizioneTitoloStudio', 'desrizioneClassificazione'], 'safe'],
            [['sesso'], 'string', 'max' => 1],
            [['cap'], 'string', 'max' => 5],
            [['codice_catastale'], 'string', 'max' => 4],
            [['cf'], 'string', 'max' => 16],
            [['ts', 'telefono', 'cellulare', 'telefono_rif', 'email', 'n_doc'], 'string', 'max' => 50],
            [['utente'], 'string', 'max' => 130],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cognome' => 'Cognome',
            'nome' => 'Nome',
            'sesso' => 'Sesso',
            'indirizzo' => 'Indirizzo',
            'citta' => 'Città',
            'id_provincia' => 'Provincia',
            'nomeProvincia' => 'Provincia',
            'id_cittadinanza' => 'Cittadinanza',
            'descrizioneCittadinanza' => 'Cittadinanza',
            'id_stato_nascita' => 'Stato di nascita',
            'descrizioneStatoNascita' =>'Stato di nascita',
            'cap' => 'Cap',
            'luogo_nascita' => 'Luogo Nascita',
            'codice_catastale' => 'Codice Catastale',
            'data_nascita' => 'Data Nascita',
            'cf' => 'Codice Fiscale',
            'ts' => 'Tessera Sanitaria',
            'telefono' => 'Telefono',
            'cellulare' => 'Cellulare',
            'telefono_rif' => 'Telefono di riferimento',
            'email' => 'Email',
            'id_tipo_doc' => 'Tipo documento',
            'descrizioneTipoDocumento' => 'Tipo documento',
            'n_doc' => 'Numero documento',
            'data_ril' => 'Data Rilascio',
            'data_exp' => 'Data Scadenza',
            'id_luogo_rilascio' => 'Luogo Rilascio',
            'luogoRilascio' => 'Luogo Rilascio',
            'descrizioneStatoCivile' => 'Stato Civile',
            'id_stato_civile' => 'Stato Civile',
            'id_professione' => 'Professione',
            'id_titolo_studio' => 'Titolo Studio',
            'descrizioneProfessione' => 'Professione',
            'descrizioneTitoloStudio' => 'Titolo Studio',
            'id_classificazione' => 'Classificazione',
            'descrizioneClassificazione' => 'Classificazione',
            'data' => 'Data',
            'utente' => 'Utente',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     *
     * Descrizioni per visualizzare nella view
     *
     */
    public function getProvincia()
    {
        return $this->hasOne(Province::className(), ['id' => 'id_provincia']);
    }

    public function getProvinciaByID($id_provincia = 0)
    {
        return $this->hasOne(Province::className(), ['id' => $id_provincia]);
    }

    public function getTipoDocumento()
    {
        return $this->hasOne(Tipodocumento::className(), ['id' => 'id_tipo_doc']);
    }

    public function getCittadinanza()
    {
        return $this->hasOne(Nazioni::className(), ['id' => 'id_cittadinanza']);
    }

    public function getStatoNascita()
    {
        return $this->hasOne(Nazioni::className(), ['id' => 'id_stato_nascita']);
    }

    public function getLuogoRilascio()
    {
        return $this->hasOne(Comuni::className(), ['id' => 'id_luogo_rilascio']);
    }

    public function getLuogoRilascioByID($id_luogo_rilascio = 0)
    {
        return $this->hasOne(Comuni::className(), ['id' => $id_luogo_rilascio]);
    }

    public function getStatoCivile()
    {
        return $this->hasOne(Statocivile::className(), ['id' => 'id_stato_civile']);
    }

    public function getProfessione()
    {
        return $this->hasOne(Professione::className(), ['id' => 'id_professione']);
    }

    public function getTitoloStudio()
    {
        return $this->hasOne(Titolostudio::className(), ['id' => 'id_titolo_studio']);
    }

    public function getClassificazione()
    {
        return $this->hasOne(Classificazione::className(), ['id' => 'id_classificazione']);
    }
}
