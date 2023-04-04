<?php

interface Mediator
{
    public function notify(Component $sender, $event);
}

abstract class Component
{
    protected $mediator;

    public function __construct(Mediator $mediator = null)
    {
        $this->mediator = $mediator;
    }

    public function setMediator(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function send($event)
    {
        $this->mediator->notify($this, $event);
    }
}

class DatePicker extends Component
{
    public function setDate($date)
    {
        $this->send(['event' => 'date_changed', 'data' => $date]);
    }
}

class RecipientCheckbox extends Component
{
    public function setRecipient($recipient)
    {
        $this->send(['event' => 'recipient_changed', 'data' => $recipient]);
    }
}

class OrderFormMediator implements Mediator
{
    protected $datePicker;
    protected $recipientCheckbox;

    public function setDatePicker(DatePicker $datePicker)
    {
        $this->datePicker = $datePicker;
    }

    public function setRecipientCheckbox(RecipientCheckbox $recipientCheckbox)
    {
        $this->recipientCheckbox = $recipientCheckbox;
    }

    public function notify(Component $sender, $event)
    {
        if ($event['event'] === 'date_changed') {
            $date = $event['data'];
        } elseif ($event['event'] === 'recipient_changed') {
            $recipient = $event['data'];
        }
    }
}