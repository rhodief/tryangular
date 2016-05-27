<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $articles = $this->paginate($this->Articles);
        
        $this->set(compact('articles'));
        $this->set('_serialize', ['articles']);
        $this->viewBuilder()->layout(false); //Evita o carregamento do layout!!!
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);

        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $msg = '';
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data['Article']);
            if ($this->Articles->save($article)) {
                $msg = 'Artigo Criado Com Sucesso!';
            } else {
                $msg = 'Artigo Não pôde ser criado!';
            }
        }
        $this->set([
            'msg' => $msg,
            'article' => $article,
            '_serialize' => ['msg', 'article']
        ]);
        $this->viewBuilder()->layout(false); //Evita o carregamento do layout!!!
        
    }

    //Para Visualização e Edição, vou serpar a view do controller....
    //essas funções só servem para chamar a view
    //o Que vai chamar os dados é a função ver() no core.js, ao carregar a página
    public function mod(){
        $this->viewBuilder()->layout(false);
        
    }
    public function det(){
        $this->viewBuilder()->layout(false);
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        $msg = '';
        $this->set([
            'msg' => $msg,
            'article' => $article,
            '_serialize' => $article
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->data['article']);
            if ($this->Articles->save($article)) {
                $msg = "Artigo Alterado com Sucesso";
            } else {
                $msg = "Erro! Tente Novamente!";
            }
            $this->set([
            'msg' => $msg,
            '_serialize' => ['msg']
        ]);
        }
        
        $this->viewBuilder()->layout(false);//Evita o carregamento do layout!!!
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
