<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Core\Configure;
use Cake\Mailer\Mailer;
/**
 * Enquiries Controller
 *
 * @property \App\Model\Table\EnquiriesTable $Enquiries
 * @method \App\Model\Entity\Enquiry[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnquiriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['add']);
    }
    public function index()
    {
        $enquiries = $this->paginate($this->Enquiries);

        $this->set(compact('enquiries'));
    }

    /**
     * View method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enquiry = $this->Enquiries->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('enquiry'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('enquiry_default');
        $enquiry = $this->Enquiries->newEmptyEntity();
        if ($this->request->is('post')) {
            $enquiry = $this->Enquiries->patchEntity($enquiry, $this->request->getData());
            if ($enquiry = $this->Enquiries->save($enquiry)) {
                //Send email
                $mailer = new Mailer('default');
                //set up email parameters
                $mailer
                    ->setEmailFormat('html')
                    ->setTo(Configure::read('EnquiryMail.to'))
                    ->setFrom(Configure::read('EnquiryMail.from'))
                    ->setReplyTo($enquiry->enquiry_email)
                    ->setSubject('New enquiry from '. h($enquiry->enquiry_full_name)."<".h($enquiry->enquiry_email).">")
                    ->viewBuilder()
                    ->disableAutoLayout()
                    ->setTemplate('enquiry');
                //->setLayout('fancy');
                //send date the email template
                $mailer->setViewVars([
                    'enquiry_body' => $enquiry->enquiry_body,
                    'enquiry_full_name'=>$enquiry->enquiry_full_name,
                    'enquiry_email'=>$enquiry->enquiry_email,
                    'enquiry_created_time'=>$enquiry->enquiry_created_time,
                    'enquiry_id'=>$enquiry->enquiry_id
                ]);
                //send email
                $email_result=$mailer->deliver();

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enquiry = $this->Enquiries->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enquiry = $this->Enquiries->patchEntity($enquiry, $this->request->getData());
            if ($this->Enquiries->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enquiry could not be saved. Please, try again.'));
        }
        $this->set(compact('enquiry'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enquiry id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enquiry = $this->Enquiries->get($id);
        if ($this->Enquiries->delete($enquiry)) {
            $this->Flash->success(__('The enquiry has been deleted.'));
        } else {
            $this->Flash->error(__('The enquiry could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function mark($id = null){
        $enquiry = $this->Enquiries->get($id);
        if($enquiry->enquiry_email_sent){
            $this->Flash->error(__('This enquiry is already marked as sent. '));
        }else{
            $enquiry->enquiry_email_sent=true;
            if ($this->Enquiries->save($enquiry)) {
                $this->Flash->success(__('The enquiry has been marked as sent. '));
            } else {
                $this->Flash->error(__('The enquiry could not be marked as sent. Please, try again.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }
}
