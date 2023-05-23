<?php

namespace ProcessWire;

class MailQueueConfig extends Wire
{
    protected array $data;
    protected array $configDefaults = [
        "queue_interval" => "every10Minutes"
    ];

    protected array $intervalOptions = [
        "every30Seconds" => "30 Sekunden",
        "everyMinute" => "1 Minute",
        "every2Minutes" => "2 Minuten",
        "every3Minutes" => "3 Minuten",
        "every4Minutes" => "4 Minuten",
        "every5Minutes" => "5 Minuten",
        "every10Minutes" => "10 Minuten",
        "every15Minutes" => "15 Minuten",
        "every30Minutes" => "30 Minuten",
        "every45Minutes" => "45 Minuten",
        "everyHour" => "1 Stunde",
        "every2Hours" => "2 Stunden",
        "every4Hours" => "4 Stunden",
        "every6Hours" => "6 Stunden",
        "every12Hours" => "12 Stunden",
        "everyDay" => "1 Tag",
        "every2Days" => "2 Tage",
        "every4Days" => "4 Tage",
        "everyWeek" => "1 Woche",
        "every2Weeks" => "2 Wochen",
        "every4Weeks" => "4 Wochen"
    ];

    public function __construct(array $data)
    {
        foreach ($this->configDefaults as $key => $value) {
            if (!isset($data[$key]) || $data[$key] == '') $data[$key] = $value;
        }
        $this->data = $data;
    }

    public function getConfig(): InputfieldWrapper
    {
        $fields = new InputfieldWrapper();
        $modules = $this->wire("modules");

        /** @var InputfieldSelect $field */
        $field = $modules->get("InputfieldSelect");
        $field->label = __("Verarbeitungs-Intervall");
        $field->description = __("Legen Sie den Zeitraum fest, in dem die Warteschlange periodisch abgearbeitet werden soll.");
        $field->notes = __("Das Abarbeiten der Warteschlange wird mit LazyCron ausgeführt. Soll der exakte Zeitraum eingehalten werden, muss ein Cronjob angelegt werden, der einen Seitenaufruf ausführt.");
        $field->attr("name+id", "queue_interval");
        $field->attr("value", $this->data["queue_interval"]);
        $field->required = true;
        $field->addOptions($this->intervalOptions);
        $fields->add($field);

        return $fields;
    }
}