<?php
class UserSettings {
    private $emailNotifications;

    public function __construct($emailNotifications) {
        $this->emailNotifications = $emailNotifications;
    }

    public function getEmailNotifications() {
        return $this->emailNotifications;
    }

    public function setEmailNotifications($emailNotifications) {
        $this->emailNotifications = $emailNotifications;
    }

    public function createSnapshot() {
        return new UserSettingsSnapshot($this->emailNotifications);
    }

    public function restoreFromSnapshot(UserSettingsSnapshot $snapshot) {
        $this->emailNotifications = $snapshot->getEmailNotifications();
    }
}

class UserSettingsSnapshot {
    private $emailNotifications;

    public function __construct($emailNotifications) {
        $this->emailNotifications = $emailNotifications;
    }

    public function getEmailNotifications() {
        return $this->emailNotifications;
    }
}

class UserSettingsCareTaker {
    private $snapshot;

    public function setSnapshot(UserSettingsSnapshot $snapshot) {
        $this->snapshot = $snapshot;
    }

    public function getSnapshot() {
        return $this->snapshot;
    }
}
