<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 */
class QuestionsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    private function get_question($quiz, $offset)
    {
        $questions = TableRegistry::get('Questions');
        $question = $questions->find('all', [
            'conditions' => ['quize_id =' => $quiz],
            'contain' => ['Quizes'],
        ])
        ->limit(1)
        ->page($offset);
        return $question;
    }
    private function count_questions($quiz) 
    {
        $questions = TableRegistry::get('Questions');
        return $questions->find('all', [
            'conditions' => ['quize_id =' => $quiz],
            'contain' => ['Quizes'],
        ])
        ->distinct()
        ->count(); 
    }

    public function passquiz($q_id = null, $id = null )
    {
        # debug($this->request->data);
        # debug($this->request->params);
        if ($this->request->is('post')) 
            { 
                $quest = $this->get_question($q_id, $id-1)->first();
                if (($this->request->data['answer'] == 'A') && ($quest->correct_answer == false))
                {
                    $quest->total_correct_answers+=1;
                    $quest->total_answers+=1;  
                }
                else if (($this->request->data['answer'] == 'B') && ($quest->correct_answer == true))
                {
                    $quest->total_correct_answers+=1;
                    $quest->total_answers+=1;
                }
                else
                {
                    $quest->total_answers+=1;
                }
                $questions = TableRegistry::get('Questions');
                $questions->save($quest);
                unset($this->request->data['answer']);
            }
        if (!$q_id) {
            $this->Flash->error(__('The quize not found.'));
            return $this->redirect(['action' => 'index']);
            #debug('Quiz not found');
        }
        $question = $this->get_question($q_id, $id)->first();
        #debug($question);
        if (!$question) {
            unset($this->request->data['answer']);
            $this->Flash->success(__('The quize is completed.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('question'));
        $this->set('toalQuestions', $this->count_questions($q_id));
        $this->set('questionNumber', $id);
    }

    public function index()
    {
        $this->paginate = [$this->Questions,
            'contain' => ['Quizes']
        ];
        $this->set('questions', $this->paginate($this->Questions));
        $this->set('_serialize', ['questions']);
        
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Quizes']
        ]);
        $this->set('question', $question);
        $this->set('_serialize', ['question']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $question = $this->Questions->newEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $quizes = $this->Questions->Quizes->find('list', ['limit' => 200]);
        $this->set(compact('question', 'quizes'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->data);
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The question could not be saved. Please, try again.'));
            }
        }
        $quizes = $this->Questions->Quizes->find('list', ['limit' => 200]);
        $this->set(compact('question', 'quizes'));
        $this->set('_serialize', ['question']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
