<?php 
use Cake\Utility\Hash;
$this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibasenew', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?=     $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?=     $this->Html->script('jquery/adr_index', ['block' => true]); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> SAE
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('adrs/search') ?>

<div class="paginator">
    <ul class="pagination pagination-sm">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
</div>
<p><small><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of <b>{{count}}</b> total')]) ?></small></p>


<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">
                        <?= $this->Paginator->sort('id') ?>     
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adrs as $adr): ?>
            <?php $a = ($adr['assigned_to']) ? '<small class="muted">'.Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$adr->assigned_to].'</small>' : '<small class="muted">Unassigned</small>';?>

            <tr>
                <td><?php
                      echo $this->Number->format($adr->id) ;
                      ?>                      
                </td>
                <td><?php
                      echo ($adr->submitted == 2) ? $this->Html->link($adr->reference_number, ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'class' => 'btn-zangu']) : 
                        $this->Html->link($adr->created, ['action' => 'edit', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'class' => 'btn-zangu']) ; ?></td>
                <td><?= h($adr->status) ?><br><?= $a ?></td>
                <td><?= h($adr->modified) ?></td>
                <td>
                   <span class="label label-primary"><?php
                   echo ($adr->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $adr->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>
                   
                    <?php
                      echo 
                        $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status], ['escape' => false, 'style' => 'color: white;']);
                    ?>

                   <span class="label label-primary">                    
                     <?= $this->Html->link('PDF', ['action' => 'view', $adr->id, 'prefix' => $prefix, 'status' => $adr->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                     ?>
                   </span>
                   <br>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
