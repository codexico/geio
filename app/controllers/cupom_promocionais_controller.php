<?php
class CupomPromocionaisController extends AppController {

    var $name = 'CupomPromocionais';
    var $helpers = array('Html', 'Form');

    function index() {
        $this->CupomPromocional->recursive = 0;
        $this->set('cupomPromocionais', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid CupomPromocional', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('cupomPromocional', $this->CupomPromocional->read(null, $id));
    }
    /**
     * deve ser criado automaticamente ao gravar a Troca
     */
    function add() {
        if (!empty($this->data)) {
            $this->CupomPromocional->create();
            if ($this->CupomPromocional->save($this->data)) {
                $this->Session->setFlash(__('The CupomPromocional has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The CupomPromocional could not be saved. Please, try again.', true));
            }
        }
    }

    /**
     * CP nao pode ser editado para evitar erros e fraudes
     *
     * @param <type> $id
     */
    function edit($id = null) {
            if (!$id && empty($this->data)) {
                    $this->Session->setFlash(__('Invalid CupomPromocional', true));
                    $this->redirect(array('action' => 'index'));
            }
            if (!empty($this->data)) {
                    if ($this->CupomPromocional->save($this->data)) {
                            $this->Session->setFlash(__('The CupomPromocional has been saved', true));
                            $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Session->setFlash(__('The CupomPromocional could not be saved. Please, try again.', true));
                    }
            }
            if (empty($this->data)) {
                    $this->data = $this->CupomPromocional->read(null, $id);
            }
    }

    /**
     *
     * @param <type> $id Qual o caso de uso de deletar CP?
     */
    function delete($id = null) {
            if (!$id) {
                    $this->Session->setFlash(__('Invalid id for CupomPromocional', true));
                    $this->redirect(array('action' => 'index'));
            }
            if ($this->CupomPromocional->del($id)) {
                    $this->Session->setFlash(__('CupomPromocional deleted', true));
                    $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('The CupomPromocional could not be deleted. Please, try again.', true));
            $this->redirect(array('action' => 'index'));
    }



    function cupomPdf() {
//debug($content_for_layout);
        /*
        if (!$id) {
            $this->Session->setFlash('Sorry, there was no property ID submitted.');
            $this->redirect(array('action'=>'index'), null, true);
        }
         *
        */
        //Configure::write('debug',0); // Otherwise we cannot use this method while developing

        //$id = intval($id);

        //$property = $this->__view($id); // here the data is pulled from the database and set for the view
        //$property = "testestse";
        /*
        if (empty($property)) {
            $this->Session->setFlash('Sorry, there is no property with the submitted ID.');
            $this->redirect(array('action'=>'index'), null, true);
        }
        */
        $this->layout = 'pdf'; //this will use the pdf.ctp layout
        $teste = "tttestset";
        $this->set(compact('teste'));
        /*
        $teste = "tttestset";
        $this->set(compact('teste'));
        $rendered = $this->render();
        $fileext = 'pdf'; // optional: $this->params['url']['ext'];
        $filepath = TMP.'rendered'.DS;
        debug($filepath);
        $filename = md5(String::uuid()).'.'.$fileext;
        file_put_contents($filepath.$filename, $rendered); // php5 func
        $this->view = 'Media';
        $params = array(
                'id' => $filename.'x',
                'path' => $filepath,
                'extension' => $fileext,
                'download' => true, // force download
                'name' => low($this->name).'-export' // fancy name
        );
        $this->set($params);
         *
         */

        $this->render();
            //$this->redirect(array('controller'=>'Consumidores', 'action' => 'pesquisar'));
    }


}
?>