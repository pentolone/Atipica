<?php
namespace app\models;
 
use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use app\models\User;
 
/**
 * Change password form for current user only
 */
class Changepassword extends Model
{
    public $id;
    public $username;
    public $old_password;
    public $password;
    public $confirm_password;
    public $color;
    public $color_1;
    
    public $utente; // Utente attuale
    
    //private static $attuale = 'A';
    public $attuale;
 
    /**
     * @var \common\models\User
     */
    private $_user;
 
    /**
     * Creates a form model given a token.
     *
     * @param  string                          $token
     * @param  array                           $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($id, $config = [])
    {
        $this->_user = User::findIdentity($id);
        
        if (!$this->_user) {
            throw new InvalidParamException('Impossibile trovare l\'utente!');
        }
        
        $this->id = $this->_user->id;
        $this->attuale = $this->_user->pwd;
        $this->username = $this->_user->username;
        $this->utente = $this->_user->utente;
        
        parent::__construct($config);
    }
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
   //         [['old_password', 'compare', 'compareValue' => $this->attuale], 'string', 'min' => 6],
//            [['old_password', 'value'  => User::getPassword($old_password), 'compare', 'compareValue' => $this->attuale], 'string', 'min' => 6],
            [['old_password', 'password','confirm_password'], 'required'],
            [['old_password','password','confirm_password'], 'string', 'min' => 6],
 //           [['saturation'], 'value' => 8],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message'=>"Le password non coincidono"],
        ];
    }
     public function attributeLabels()
    {
        return [
            'old_password' => 'Password attuale',
            'password' => 'Nuova password',
            'confirm_password' => 'Conferma password',
        ];
    }

    /**
     * beforeValidate.
     *
     * @return boolean if old_password matches current password.
     */
    public function beforeValidate()
    {
        $u = new User;
        $checkAttuale = $u->returnHashedPassword($this->old_password);
        
        if($checkAttuale != $this->attuale) {
           $this->addError('old_password' ,'Password attuale errata');
           return false;
        }  
        return true;
    }

    /**
     * Changes password.
     *
     * @return boolean if password was changed.
     */
    public function changePassword()
    {

        if($this->validate()) {
           $user = $this->_user;

           $user->isNewRecord = false;
           $user->setPassword($this->password);
           $user->utente = $this->utente;
           
           // clear model fields
           $this->old_password = null;
           $this->password = null;
           $this->confirm_password = null;
           //var_dump($user);
           return $user->save(false);
     }
    }
}