<?php

declare(strict_types=1);

namespace OhAuthCat;

/**
 * plan_limit_reached: the plan refuses this growth. metric() is the enforced monthly ceiling the
 * API named in param, or null when the refusal is about a resource count or a feature the plan
 * lacks. Existing resources and users keep working.
 */
final class PlanLimitReachedException extends PermissionException
{
    public const METRICS = ['monthly_active_users', 'audit_log_events', 'pipes_token_fetches'];

    public function metric(): ?string
    {
        return \in_array($this->param, self::METRICS, true) ? $this->param : null;
    }
}
