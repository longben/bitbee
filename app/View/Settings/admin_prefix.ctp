<div class="settings form">
    <h2><?php echo $title_for_layout; ?></h2>

    <?php
        echo $this->Form->create('Setting', array(
            'url' => array(
                'controller' => 'settings',
                'action' => 'prefix',
                $prefix,
            ),
        ));
    ?>
    <fieldset>
    <?php
        $i = 0;
        foreach ($settings AS $setting) {
            $key = $setting['Setting']['key'];
            $keyE = explode('.', $key);
            $keyTitle = Inflector::humanize($keyE['1']);

            $label = $keyTitle;
            if ($setting['Setting']['title'] != null) {
                $label = $setting['Setting']['title'];
            }

            $inputType = 'text';
            if ($setting['Setting']['input_type'] != null) {
                $inputType = $setting['Setting']['input_type'];
            }

            echo '<div class="setting">';
                echo $this->Form->input("Setting.$i.id", array('value' => $setting['Setting']['id']));
                echo $this->Form->input("Setting.$i.key", array('type' => 'hidden', 'value' => $key));
                if ($setting['Setting']['input_type'] == 'checkbox') {
                    if ($setting['Setting']['value'] == 1) {
                        echo $this->Form->input("Setting.$i.value", array(
                            'label' => $label,
                            'type' => $setting['Setting']['input_type'],
                            'checked' => 'checked',
                            'rel' => $setting['Setting']['description'],
                        ));
                    } else {
                        echo $this->Form->input("Setting.$i.value", array(
                            'label' => $label,
                            'type' => $setting['Setting']['input_type'],
                            'rel' => $setting['Setting']['description'],
                        ));
                    }
                } else {
                    echo $this->Form->input("Setting.$i.value", array(
                        'label' => $label,
                        'type' => $inputType,
                        'value' => $setting['Setting']['value'],
                        'rel' => $setting['Setting']['description'],
                    ));
                }
            echo "</div>";
            $i++;
        }
    ?>
    </fieldset>
    <?php echo $this->Form->end("Submit"); ?>   
</div>

<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Site', true), array('action' => '/prefix/Site'));?></li>
		<li><?php echo $this->Html->link(__('Meta', true), array('action' => '/prefix/Meta'));?></li>
		<li><?php echo $this->Html->link(__('Reading', true), array('action' => '/prefix/Reading'));?></li>
		<li><?php echo $this->Html->link(__('Writing', true), array('action' => '/prefix/Writing'));?></li>
	</ul>
</div>
