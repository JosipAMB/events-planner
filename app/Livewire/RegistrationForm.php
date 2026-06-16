<?php
namespace App\Livewire;

use App\Models\Registration;
use Livewire\Component;

class RegistrationForm extends Component
{
    public $event;
    public string $name = '';
    public string $email = '';
    public bool $submitted = false;

    public function mount($event): void
    {
        $this->event = $event;
    }

    public function submit(): void
    {
        if ($this->event->spotsLeft() <= 0) {
            $this->addError('email', 'Dit evenement is helaas vol.');
            return;
        }

        $this->validate([
            'name'  => 'required|min:2',
            'email' => 'required|email',
        ]);

        $alreadyRegistered = Registration::where('event_id', $this->event->id)
            ->where('email', $this->email)
            ->exists();

        if ($alreadyRegistered) {
            $this->addError('email', 'You have already registered for this event.');
            return;
        }

        Registration::create([
            'event_id' => $this->event->id,
            'name'     => $this->name,
            'email'    => $this->email,
        ]);

        $this->submitted = true;
    }

    public function updatedEmail(): void
    {
        $registration = Registration::where('event_id', $this->event->id)
            ->where('email', $this->email)
            ->first();

        if ($registration) {
            $this->name = $registration->name;
            $this->submitted = true;
        }
    }

    public function cancel(): void
    {
        Registration::where('event_id', $this->event->id)
            ->where('email', $this->email)
            ->delete();

        $this->submitted = false;
        $this->name = '';
        $this->email = '';
    }

    public function render()
    {
        return view('livewire.registration-form');
    }
}