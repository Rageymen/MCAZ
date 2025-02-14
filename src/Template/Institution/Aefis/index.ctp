<?php 
use Cake\Utility\Hash;
$this->start('sidebar'); ?>
  <?= $this->cell('SideBar'); ?>
<?php $this->end(); ?>

<?=     $this->Html->script('jquery/vigibasenew', ['block' => true]); ?>
<?=     $this->Html->script('jquery/jquery.blockUI.min', ['block' => true]); ?>
<?=     $this->Html->script('jquery/readmore', ['block' => true]); ?>
<?=     $this->Html->script('jquery/aefi_index', ['block' => true]); ?>

<h1 class="page-header"><?= isset($this->request->query['status']) ? $this->request->query['status'] : 'All' ?> AEFIS
    :: <small style="font-size: small;"><i class="fa fa-search-plus" aria-hidden="true"></i> Search, 
              <i class="fa fa-filter" aria-hidden="true"></i>Filter or  
              <i class="fa fa-download" aria-hidden="true"></i>  Download Reports</small>
</h1>

<?= $this->element('aefis/search') ?>

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
    <table class="table table-striped table-bordered mytable">
        <thead>
            <tr>
                <th scope="col">
                    <?= $this->Paginator->sort('id') ?>      
                </th>
                <th scope="col"><?= $this->Paginator->sort('reference_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name_of_vaccination_center') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th> 
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aefis as $aefi): ?>
            <?php $a = ($aefi['assigned_to']) ? '<small class="muted">'.Hash::combine($users->toArray(), '{n}.id', '{n}.name')[$aefi->assigned_to].'</small>' : '<small class="muted">Unassigned</small>';?>
            <tr>
                <td><?php
                  echo $this->Number->format($aefi->id) ;
                ?>                    
                </td>
                <td><?php
                      echo ($aefi->submitted == 2) ? $this->Html->link($aefi->reference_number, ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'class' => 'btn-zangu']) : 
                        $this->Html->link($aefi->created, ['action' => 'edit', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'class' => 'btn-zangu']) ; ?></td>
                <td><?= h($aefi->name_of_vaccination_center) ?></td>
                <td><?= h($aefi->status) ?><br><?= $a ?></td>
                <td><?= h($aefi->modified) ?></td>
                <td>
<span class="label label-primary"><?php
                   echo ($aefi->submitted == 2) ?  $this->Html->link('E2B', ['action' => 'e2b', $aefi->id, '_ext' => 'xml', 'prefix' => false], ['escape' => false, 'style' => 'color: whitesmoke;']) : ''; ?></span>

                  <?php
                      echo ($aefi->submitted == 2) ?
                        $this->Html->link('<span class="label label-primary">View</span>', ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'style' => 'color: white;']) :
                        $this->Html->link('<span class="label label-success">Edit</span>', ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status], ['escape' => false, 'style' => 'color: white;']);
                  ?>

                   <span class="label label-primary">                    
                     <?= $this->Html->link('PDF', ['action' => 'view', $aefi->id, 'prefix' => $prefix, 'status' => $aefi->status, '_ext' => 'pdf'], ['escape' => false, 'class' => 'label-link'])
                     ?>
                   </span>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
