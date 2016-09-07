<?php namespace Tests\Services;

use App\Models\AdminUser;
use Tests\TestCase;

class AdminUserNotificationServiceTest extends TestCase
{

    public function testGetInstance()
    {
        /** @var  \App\Services\AdminUserNotificationServiceInterface $service */
        $service = \App::make(\App\Services\AdminUserNotificationServiceInterface::class);
        $this->assertNotNull($service);
    }

    public function testSendNotification()
    {
        /** @var  \App\Services\AdminUserNotificationServiceInterface $service */
        $service = \App::make(\App\Services\AdminUserNotificationServiceInterface::class);
        $this->assertNotNull($service);

        /** @var  \App\Repositories\UserNotificationRepositoryInterface $repository */
        $repository = \App::make(\App\Repositories\UserNotificationRepositoryInterface::class);
        $this->assertNotNull($repository);

        $user = factory(AdminUser::class)->create();

        $notification1 = $service->sendNotification($user->id, 'somecategory', 'sometype', '', 'TEST MESSAGE', ['test'=>1]);
        $notification2 = $service->broadcastSystemMessage(UserNotification::TYPE_GENERAL_MESSAGE, \App::getLocale(), 'BROADCAST MESSAGE');

        $this->assertEquals(1, $notification1->getData('test'));
        $this->assertEquals('BROADCAST MESSAGE', $notification2->content);

        $count = $repository->countUnreadByUserId($user->id, 0);

        $this->assertEquals(2, $count);

        $count = $repository->countUnreadByUserId($user->id, $notification1->id);

        $this->assertEquals(1, $count);

        $count = $repository->countUnreadByUserId($user->id, $notification2->id);

        $this->assertEquals(0, $count);
    }
}
