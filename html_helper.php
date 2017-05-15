<?php

function text_input($name, $value, $attributes = [])
{
    // task: generate a string containing HTML for a <input type="text"
    $html = '';
    $html .= '<input type="text" ';                     // <input type="text" 
    // $name would be used as $name attribute
    $html .= 'name="'.htmlspecialchars($name).'" ';     // name="title" 
    // $value would be used as $value attribute
    $html .= 'value="'.htmlspecialchars($value).'" ';   // value="My amazing title" 
    // foreach($attributes as $attribute_name => $attribute_value)
    foreach($attributes as $attribute_name => $attribute_value)
    {
        // add another attribute
        $html .= $attribute_name.'="'.htmlspecialchars($attribute_value).'" ';
    }
    $html .= '>';

    return $html;
}

function textarea($name, $value, $attributes = [])
{
    // task: generate a string containing HTML for a <input type="text"
    $html = '';
    $html .= '<textarea ';                     // <textarea 
    // $name would be used as $name attribute
    $html .= 'name="'.htmlspecialchars($name).'" ';     // name="title"
    
    foreach($attributes as $attribute_name => $attribute_value)
    {
        // add another attribute
        $html .= $attribute_name.'="'.htmlspecialchars($attribute_value).'" ';
    } 
    $html .= '>';                              // >

    // $value would be used as $value attribute
    $html .= htmlspecialchars($value);   // My amazing title 

    $html .= '</textarea>';

    return $html;
}

function hidden_input($name, $value, $attributes = [])
{
    // attributes HTML has to be generated separately (because of foreach)
    $attributes_html = '';
    foreach($attributes as $attribute_name => $attribute_value)
    {
        // add another attribute
        $attributes_html .= $attribute_name.'="'.htmlspecialchars($attribute_value).'" ';
    }

    $html = '<input type="hidden" name="'.htmlspecialchars($name).'" value="'.htmlspecialchars($value).'" '.$attributes_html.'>';

    return $html;
}

hidden_input('name', 'value', ['id' => 'an_id']);

function select_old($name, $options, $value, $attributes = [])
{
    $attributes_html = '';
    foreach($attributes as $attribute_name => $attribute_value)
    {
        // add another attribute
        $attributes_html .= $attribute_name.'="'.htmlspecialchars($attribute_value).'" ';
    }

    $html = '<select name="'.htmlspecialchars($name).'" '.$attributes_html.'>';
    foreach($options as $val => $name)
    {
        $html .= '<option value="'.htmlspecialchars($val).'"'.($val==$value?' selected':'').'>'.htmlspecialchars($name).'</option>';
    }
    $html .= '</select>';

    return $html;
}

/**
 * generates a HTML paragraph with $content as its contents
 *
 * returns the string with the HTML
 */
function paragraph($content, $class)
{
    return '<p class="'.htmlspecialchars($class).'">'.$content.'</p>';
}

function option($label, $value, $is_selected = false)
{
    if($is_selected)
    {
        $selected_string = ' selected';
    }
    else
    {
        $selected_string = '';
    }
    return '<option value="'.htmlspecialchars($value).'" '.$selected_string.'>'.$label.'</option>';

    // with ternary operator
    return '<option value="' . htmlspecialchars($value) . '" ' . ($is_selected ? ' selected' : '') . '>' . $label           . '</option>';
    //     '<option value="' . '1'                      . '" ' . 'selected'                        . '>' . 'Name of option' . '</option>'
}

// echo option('First', 1); // <option value="1">First</option>

// echo paragraph('Hello', 'first'); // <p class="first">Hello</p>

// create a list of option
$options = [
    0 => 'unknown',
    1 => 'Icecream',
    2 => 'Hamburger',
    3 => 'Pizza'
];

// determine the value to be selected
$selected_value = 3;


function select($name, $options, $selected_value)
{
    ?>

<select name="<?php echo $name; ?>">

    <!-- options here -->
    <?php foreach($options as $value => $name) : ?>

        <?php echo option($name, $value, $value == $selected_value); ?>

    <?php endforeach; ?>

</select>

    <?php
}

?>
<?php // echo select('food', $options, $selected_value); ?>