<?php
class User extends AppModel {

    var $name = 'User';
    var $validate = array(
            'username' => array('notempty'),
            //'password' => array('notempty'),
            'passwd' => array('Campo Requerido' => 'notempty',
                            //tamanho
                            'length' => array(
                                            'rule' => array('minLength', 8),
                                            'message' => 'A senha deve ter no mínimo 8 caracteres')
            ),
            'passwd_confirm' => array(
                            'match' =>  array(
                                            'rule'          => 'validatePasswdConfirm',
                                            'required'      => true,
                                            'allowEmpty'    => false,
                                            'message' => 'As senhas devem ser iguais'
                            )
            ),
            'group_id' => array('numeric')
    );
    function validatePasswdConfirm($data) {
        if ($this->data['User']['passwd'] !== $data['passwd_confirm']) {
            return false;
        }

        return true;
    }


    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
            'Group' => array(
                            'className' => 'Group',
                            'foreignKey' => 'group_id',
                            'conditions' => '',
                            'fields' => '',
                            'order' => ''
            )
    );

    var $hasMany = array(
            'Promotor' => array(
                            'className' => 'Promotor',
                            'foreignKey' => 'user_id',
                            'dependent' => false,
                            'conditions' => '',
                            'fields' => '',
                            'order' => '',
                            'limit' => '',
                            'offset' => '',
                            'exclusive' => '',
                            'finderQuery' => '',
                            'counterQuery' => ''
            ),
            'Usuario' => array(
                            'className' => 'Usuario',
                            'foreignKey' => 'user_id',
                            'dependent' => false,
                            'conditions' => '',
                            'fields' => '',
                            'order' => '',
                            'limit' => '',
                            'offset' => '',
                            'exclusive' => '',
                            'finderQuery' => '',
                            'counterQuery' => ''
            )
    );

    var $actsAs = array('Acl' => 'requester');

    function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        $data = $this->data;
        if (empty($this->data)) {
            $data = $this->read();
        }
        if (!$data['User']['group_id']) {
            return null;
        } else {
            return array('Group' => array('id' => $data['User']['group_id']));
        }
    }


    /**
     * Pega o valor do campo temporario 'passwd' e tranforma em hash.
     * Este campo precisa existir para haver validacao de password pois
     * o Acl automaticamente faz o hash, mesmo se o campo estiver vazio.
     *
     * @link http://dsi.vozibrale.com/articles/view/manually-hashing-password-and-password-validation
     *
     * @return boolean
     */
    function beforeSave() {
        if (isset($this->data['User']['passwd'])) {
            $this->data['User']['password'] =
                    Security::hash($this->data['User']['passwd'], null, true);
            unset($this->data['User']['passwd']);
        }

        if (isset($this->data['User']['passwd_confirm'])) {
            unset($this->data['User']['passwd_confirm']);
        }

        return true;
    }

    /**
     * After save callback
     *
     * Update the aro for the user.
     *
     * @access public
     * @return void
     */
    function afterSave($created) {
        if (!$created) {
            $parent = $this->parentNode();
            $parent = $this->node($parent);
            $node = $this->node();
            $aro = $node[0];
            $aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
            $this->Aro->save($aro);
        }
    }
    
}
?>