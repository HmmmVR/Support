<?php

namespace HmmmVR\Support;

class Str
{

    private $subject;

    private $modification;

    private $limit;

    public function __construct(string $subject = null)
    {
        $this->subject = $subject ?? "";
        $this->modification = $this->subject;
    }

    public function modify(string $str)
    {
        if ($this->limit != null) {
            $str = substr($str, 0, $limit);
        }

        $this->modification = $str;
        return $this;
    }

    public function get()
    {
        return $this->modification;
    }

    public function reset()
    {
        return new self($this->subject);
    }

    public function trim(string $chars = null)
    {
        if ($chars !== null) {
            $this->modify(trim($this->modification, $chars));
        } else {
            $this->modify(trim($this->modification));
        }

        return $this;
    }

    public function startsWith(string $subject)
    {
        return preg_match("/^{$subject}/m", $this->modification);
    }

    public function endsWith(string $subject)
    {
        return preg_match("/{$subject}$/m", $this->modification);
    }

    public function includes(string $subject, int $offset = 0)
    {
        return strpos($this->modification, $subject, $offset) !== false;
    }

    public function splitOn(string $char)
    {
        return new Arr(explode($char, $this->modification));
    }

    public function toLower()
    {
        $this->modify(strtolower($this->modification));
        return $this;
    }

    public function toUpper()
    {
        $this->modify(strtoupper($this->modification));
        return $this;
    }

    public function uppercaseFirst()
    {
        $this->modify(ucfirst($this->modification));
        return $this;
    }

    public function lowercaseFirst()
    {
        $this->modify(lcfirst($this->modification));
        return $this;
    }

    public function getFirstChar()
    {
        return $this->modification[0];
    }

    public function getLastChar()
    {
        return $this->modification[strlen($this->modification) - 1];
    }

    public function getChar(int $index)
    {
        return $this->modification[$index];
    }

    public function isSameAs(string $subject)
    {
        return $this->modification === $subject;
    }

    public function replace(string $subject, string $to)
    {
        $this->modify(str_replace($subject, $to, $this->modification));
        return $this;
    }

    public function slugify()
    {
        return $this;
    }

    public function limit(int $limit)
    {
        $this->limit = $limit;
        $this->modify($this->modification);
        return $this;
    }
}
