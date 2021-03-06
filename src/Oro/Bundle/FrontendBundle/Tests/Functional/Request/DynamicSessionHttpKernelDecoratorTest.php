<?php

namespace Oro\Bundle\FrontendBundle\Tests\Functional\Request;

use Oro\Bundle\FrontendBundle\Request\DynamicSessionHttpKernelDecorator;
use Oro\Bundle\TestFrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class DynamicSessionHttpKernelDecoratorTest extends WebTestCase
{
    protected function setUp()
    {
        $this->initClient();
    }

    public function testContainerShouldBePossibleToChangeSessionOptionsForFrontendRequest()
    {
        $frontendSessionName = 'TESTSFID';
        $container = self::getContainer();
        $kernelDecorator = new DynamicSessionHttpKernelDecorator(
            $container->get('kernel'),
            $container,
            $container->get('oro_frontend.request.frontend_helper'),
            ['name' => $frontendSessionName]
        );

        $kernelDecorator->handle(Request::create($this->getUrl('oro_frontend_root')));

        $sessionOptions = $container->getParameter('session.storage.options');
        self::assertEquals($frontendSessionName, $sessionOptions['name']);
    }
}
