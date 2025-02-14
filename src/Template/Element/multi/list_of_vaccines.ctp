<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Aefi $aefi
 */
// $this->Html->script('multi/list_of_aefis', array('inline' => false));
$this->Html->script('multi/list_of_vaccines_up', ['block' => true]);
?>
<div class="row">
  <div class="col-xs-12">
    <h3 class="text-center">Vaccines <button <?= ($editable) ? '' : 'disabled=""' ?> type="button" class="btn btn-primary btn-sm" id="<?= ($editable) ? 'addAefiVaccine' : 'disabledAdd'  ?>">
        Add <i class="fa fa-plus"></i>
      </button></h3>
  </div>
</div>
<div class="row">
  <div class="col-xs-12">
    <table id="<?= ($editable) ? 'listOfVaccinesTable' : 'disabledlist'  ?>" class="table table-bordered table-condensed">
      <thead>
        <tr>
          <th colspan="7" style="width: 65%">Vaccine</th>
          <th colspan="5">Diluent</th>
        </tr>
        <tr>
          <th colspan="2" style="width: 20%"> Name of vaccine<br>(Generic) </th>
          <th colspan="1" style="width: 20%"> *Brand Name <br>incl. Name of<br>Manufacturer </th>
          <th colspan="2" style="width: 20%">
            <h5>Date and Time of Vaccination <br><small id="helpBlock" class="has-warning">Format dd-mm-yyyy hh24:min</small></h5>
          </th>
          <th style="width: 5%"> Dose (1st, 2nd...) </th>
          <th style="width: 5%"> Batch/Lot number </th>
          <th> Expiry date </th>
          <th style="width: 5%"> Batch/ Lot Number </th>
          <th> Expiry date </th>
          <th> Time of reconstitution </th>
          <th colspan="2"> Tick Suspected Vaccine(s)
            <?php
            echo $this->Form->input('suspected_drug', ['type' => 'hidden', 'templates' => ($editable) ?  'app_form' : ['input' => '']]);
            if ($this->Form->isFieldError('suspected_drug')) {
              echo "<span style='color: #b50909;'>Select at least one vaccine</span>";
            }
            ?>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        //Dynamic fields
        if (isset($followup_form)) {
          $list_of_vaccines = (!empty($followup['aefi_list_of_vaccines'])) ? $followup['aefi_list_of_vaccines'] : '';
        } elseif (isset($aefi['aefi_list_of_vaccines'])) {
          $list_of_vaccines = (!empty($aefi['aefi_list_of_vaccines'])) ? $aefi['aefi_list_of_vaccines'] : '';
        } elseif (isset($saefi['aefi_list_of_vaccines'])) {
          $list_of_vaccines = (!empty($saefi['aefi_list_of_vaccines'])) ? $saefi['aefi_list_of_vaccines'] : '';
        }
        if (!empty($list_of_vaccines)) {
          for ($i = 0; $i <= count($list_of_vaccines) - 1; $i++) {
             
        ?>
            <tr>
              <td><?= $i + 1; ?></td>
              <td><?php
                  echo $this->Form->input('aefi_list_of_vaccines.' . $i . '.id', ['templates' => 'app_form']);
                  echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.vaccine_name', [
                    'label' => false,
                    'templates' => ($editable) ? 'table_form' : 'view_form_table'
                  ]);
                  ?>
              </td>
              <td>
                <?php
                  echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.manufacturer', [
                    'label' => false,
                    'templates' => ($editable) ? 'table_form' : 'view_form_table'
                  ]);
                  ?>
              </td>
              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.vaccination_date', [
                  'label' => false,
                  'type' => 'text',
                  'templates' => ($editable) ? [
                    'input' => '<input class="form-control datetime-field" type="{{type}}" name="{{name}}"{{attrs}}/>',
                    'formGroup' => ' {{label}}{{input}} ',
                  ] : 'view_form_table'
                ]);
                ?>
              </td>
              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.vaccination_time', [
                  'label' => false,
                  'placeholder' => '14:00',
                  'type' => 'text',
                  'templates' => ($editable) ? [
                    'input' => '<input class="form-control " type="{{type}}" name="{{name}}"{{attrs}}/>',
                    'formGroup' => ' {{label}}{{input}} ',
                  ] : 'view_form_table'
                ]);
                ?>
              </td>
              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.dosage', ['label' => false, 'templates' => ($editable) ? 'table_form' : 'view_form_table']);
                ?>
              </td>
              <td><?php echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.batch_number', [
                    'label' => false,
                    'type' => 'text', 'templates' => ($editable) ? 'table_form' : 'view_form_table'
                  ]); ?>
              </td>
              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.expiry_date', [
                  'type' => 'text',
                  'label' => false,
                  'templates' => ($editable) ? 'dates_form' : 'view_form_table'
                ]);
                ?>
              </td>

              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.diluent_batch_number', [
                  'type' => 'text',
                  'label' => false,
                  'templates' => ($editable) ? 'table_form' : 'view_form_table'
                ]);
                ?>
              </td>
              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.diluent_expiry_date', [
                  'type' => 'text',
                  'label' => false,
                  'templates' => ($editable) ? 'dates_form' : 'view_form_table'
                ]);
                ?>
              </td>
              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.diluent_date', [
                  'type' => 'text',
                  'label' => false,
                  'templates' => ($editable) ? [
                    'input' => '<input class="form-control datetime-field" type="{{type}}" name="{{name}}"{{attrs}}/>',
                    'formGroup' => ' {{label}}{{input}} ',
                  ] : 'view_form_table'
                ]);
                ?>
              </td>
              <td>
                <?php
                echo $this->Form->control('aefi_list_of_vaccines.' . $i . '.suspected_drug', ['label' => false, 'type' => 'checkbox', 'templates' => ($editable) ? 'table_form' : 'view_form_checkbox'])
                ?>
              </td>
              <td>
                <button <?= ($editable) ? '' : 'disabled=""'  ?> type="button" class="btn btn-danger btn-sm remove-vaccine" value="
                <?php if (isset($aefi['aefi_list_of_vaccines'][$i]['id'])) {
                  echo $aefi['aefi_list_of_vaccines'][$i]['id'];
                } ?>">
                  <i class="fa fa-minus"></i>
                </button>
              </td>
            </tr>

        <?php }
        } ?>

      </tbody>
    </table>
  </div><!--/span-->
</div><!--/row-->
<hr>