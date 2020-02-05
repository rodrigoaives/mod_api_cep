<?php
/**
 * Helper class for Hello World! module
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModApiCepHelper
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
    public static function getResultado($cep)
    {

        try { 

            if (isset($cep)) {

                $url = "https://viacep.com.br/ws/" . $cep . "/json";
                
                $results = array();

                $results = file_get_contents($url);

                $results = json_decode($results, true);
    
                if (!isset($results['erro'])) {
    
                    echo "Rua: " . $results['logradouro'] . "<br>";
                    echo "Bairro: " . $results['bairro'] . "<br>";
                    echo "Cidade: " . $results['localidade'] . "<br>";
                    echo "Estado: " . $results['uf'];
    
                }
            
            } else {
    
                echo 'Erro.';
    
            }
            
        } catch(Exception $e) { 

            var_dump($e);

        }
        
    }

}