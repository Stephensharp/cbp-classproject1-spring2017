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

function select($name, $options, $value, $attributes = [])
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

function option($label, $value)
{
    return '<option value="'.htmlspecialchars($value).'">'.$label.'</option>';
}

echo option('First', 1); // <option value="1">First</option>

echo paragraph('Hello', 'first'); // <p class="first">Hello</p>

$options = [
    0 => 'unknown',
    1 => 'Icecream',
    2 => 'Hamburger',
    3 => 'Pizza'
];

?>
What are we going to eat?<br>
<select name="food">

    <!-- options here -->

</select>