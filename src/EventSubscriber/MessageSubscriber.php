<?php

namespace App\EventSubscriber;

use App\Entity\Message;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

class MessageSubscriber implements EventSubscriber
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    /**
     * Constructor
     *
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribedEvents()
    {
        return array(
            'postPersist',
        );
    }

    /**
     * Send me en email when a message is posted through the contact form
     *
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
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
