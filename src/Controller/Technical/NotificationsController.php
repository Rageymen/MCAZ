<?php
namespace App\Controller\Technical;

use App\Controller\AppController;
use App\Controller\Base\NotificationsBaseController;

/**
 * Notifications Controller
 *
 * @property \App\Model\Table\NotificationsTable $Notifications
 *
 * @method \App\Model\Entity\Notification[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NotificationsController extends NotificationsBaseController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    // public function index()
    // {
    //     $this->paginate = [
    //         'contain' => ['Users', 'Messages']
    //     ];
    //     $notifications = $this->paginate($this->Notifications);

    //     $this->set(compact('notifications'));
    // }

    // /**
    //  * View method
    //  *
    //  * @param string|null $id Notification id.
    //  * @return \Cake\Http\Response|void
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function view($id = null)
    // {
    //     $notification = $this->Notifications->get($id, [
    //         'contain' => ['Users', 'Messages']
    //     ]);

    //     $this->set('notification', $notification);
    // }

    // /**
    //  * Add method
    //  *
    //  * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
    //  */
    // public function add()
    // {
    //     $notification = $this->Notifications->newEntity();
    //     if ($this->request->is('post')) {
    //         $notification = $this->Notifications->patchEntity($notification, $this->request->getData());
    //         if ($this->Notifications->save($notification)) {
    //             $this->Flash->success(__('The notification has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The notification could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Notifications->Users->find('list', ['limit' => 200]);
    //     $messages = $this->Notifications->Messages->find('list', ['limit' => 200]);
    //     $this->set(compact('notification', 'users', 'messages'));
    // }

    // /**
    //  * Edit method
    //  *
    //  * @param string|null $id Notification id.
    //  * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    //  * @throws \Cake\Network\Exception\NotFoundException When record not found.
    //  */
    // public function edit($id = null)
    // {
    //     $notification = $this->Notifications->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $notification = $this->Notifications->patchEntity($notification, $this->request->getData());
    //         if ($this->Notifications->save($notification)) {
    //             $this->Flash->success(__('The notification has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The notification could not be saved. Please, try again.'));
    //     }
    //     $users = $this->Notifications->Users->find('list', ['limit' => 200]);
    //     $messages = $this->Notifications->Messages->find('list', ['limit' => 200]);
    //     $this->set(compact('notification', 'users', 'messages'));
    // }

    // /**
    //  * Delete method
    //  *
    //  * @param string|null $id Notification id.
    //  * @return \Cake\Http\Response|null Redirects to index.
    //  * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    //  */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $notification = $this->Notifications->get($id);
    //     if ($this->Notifications->delete($notification)) {
    //         $this->Flash->success(__('The notification has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The notification could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
