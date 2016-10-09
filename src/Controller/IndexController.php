<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Ainias\CodeManagement\Controller;

use Ainias\Core\Controller\ServiceActionController;
use Ainias\CodeManagement\Model\Code;
use Ainias\CodeManagement\Model\Manager\CodeManager;

class IndexController extends ServiceActionController
{
    public function doCodeAction()
    {
        $codeString = $this->params("code");
        /** @var CodeManager $codeManager */
        $codeManager = $this->get(CodeManager::class);

        /** @var Code $code */
        $code = $codeManager->getCodeByCode($codeString);
        if ($code != null)
        {
            $result = $code->resolveCode($this->getServiceLocator(), $this);
            $errorMessage = $code->getErrorMessage();
            if ($errorMessage == null)
            {
                $message = $code->getSuccessMessage();
                if ($message != null)
                {
                    $this->flashMessenger()->addSuccessMessage($message);
                }
            }
            else
            {
                $this->flashMessenger()->addErrorMessage($errorMessage);
            }
            return $result;
        }
        return $this->triggerDispatchError();
    }
}
