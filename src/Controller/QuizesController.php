<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Quizes Controller
 *
 * @property \App\Model\Table\QuizesTable $Quizes
 */
class QuizesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

    

    public function index()
    {
        $this->set('quizes', $this->paginate($this->Quizes));
        $this->set('_serialize', ['quizes']);
    }

    /**
     * View method
     *
     * @param string|null $id Quize id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quize = $this->Quizes->get($id, [
            'contain' => ['Questions']
        ]);
        $this->set('quize', $quize);
        $this->set('_serialize', ['quize']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quize = $this->Quizes->newEntity();
        if ($this->request->is('post')) {
            $quize = $this->Quizes->patchEntity($quize, $this->request->data);
            if ($this->Quizes->save($quize)) {
                $this->Flash->success(__('The quize has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quize could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('quize'));
        $this->set('_serialize', ['quize']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Quize id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quize = $this->Quizes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quize = $this->Quizes->patchEntity($quize, $this->request->data);
            if ($this->Quizes->save($quize)) {
                $this->Flash->success(__('The quize has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The quize could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('quize'));
        $this->set('_serialize', ['quize']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Quize id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quize = $this->Quizes->get($id);
        if ($this->Quizes->delete($quize)) {
            $this->Flash->success(__('The quize has been deleted.'));
        } else {
            $this->Flash->error(__('The quize could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
