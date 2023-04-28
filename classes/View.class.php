<?php
require_once('Database.class.php');

class View {
    private $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function render($template) {
        $db = new Database();

        // Get the contents of the template file
        $template_file = 'templates/'.$template.'.php';
        if (!file_exists($template_file)) {
            throw new Exception('Template file not found: '.$template_file);
        }
        $template_contents = file_get_contents($template_file);

        // Replace template variables with data
        foreach ($this->data as $key => $value) {
            $template_contents = str_replace('{{'.$key.'}}', $value, $template_contents);
        }

        // Output the rendered template
        echo $template_contents;
    }
}
?>

