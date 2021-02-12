<?php
namespace GDO\Python;

use GDO\Core\GDO_Module;
use GDO\File\GDT_Path;
use GDO\Util\Process;

/**
 * Python bindings.
 * PATH config.
 * 
 * @author gizmore
 * @version 6.10
 * @since 6.10
 */
final class Module_Python extends GDO_Module
{
    public function getConfig()
    {
        return [
            GDT_Path::make('python_path')->initial('python')->existingFile(),
        ];
    }
    
    public function cfgPythonPath() { return $this->getConfigVar('python_path'); }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/python'); }
    
    public function onInstall()
    {
        $path = Process::commandPath('python');
        $this->saveConfigVar('python_path', $path);
    }
    
}
