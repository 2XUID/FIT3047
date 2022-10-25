<?php
declare(strict_types=1);


namespace App\Controller;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\CustomersTable $Customers
 * @property \App\Model\Table\ProductsTable $Products
 * @property \App\Model\Table\OrderLinesTable $OrderLines
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers'],
        ];
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Customers','OrderLines'],
        ]);

        $this->set(compact('order'));
        $this->set('OrderLines', $this->Orders->OrderLines->find('all'));
        $products = $this->Orders->Products->find('all', ['valueFields'=>'product_name']);
        $this->set(compact('order','products'));

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());

            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $customers = $this->Orders->Customers->find('list',['keyField'=> 'customer_id', 'valueField'=>'customer_name']);
        $this->set(compact('order','customers'));

        $products = $this->Orders->OrderLines->Products->find('list', ['keyFields'=>'product_id', 'valueField'=>'product_name']);

        $this->set(compact('products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['OrderLines'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $customers = $this->Orders->Customers->find('list',['keyField'=> 'customer_id', 'valueField'=>'customer_name']);
        $this->set(compact('order','customers'));

        $orderLines = $this->Orders->OrderLines->find('all', ['conditions'=>['Orders.order_id' == 'OrderLines.order_id']
        ]);
        $this->set(compact('order', 'orderLines'));

        $products = $this->Orders->Products->find('all', ['valueFields'=>'product_name']);
        $this->set(compact('order','products'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
