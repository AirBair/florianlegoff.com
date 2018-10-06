<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Message;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class MessageSubscriber implements EventSubscriber
{
    /**
     * Mailer service instance.
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents(): array
    {
        return array(
            'postPersist',
        );
    }

    /**
     * Send me en email when a message is posted through the contact form.
     */
    public function postPersist(LifecycleEventArgs $args): void
    {
        $object = $args->getObject();

        if ($object instanceof Message) {
            $message = new \Swift_Message();
            $message
                ->setSubject($object->getSubject())
                ->setFrom('noreply@florianlegoff.com', $object->getName())
                ->setTo('contact@florianlegoff.com')
                ->setReplyTo($object->getEmail())
                ->setBody($object->getMessage());

            $this->mailer->send($message);
        }
    }
}
