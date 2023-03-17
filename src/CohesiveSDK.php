<?php
namespace Cohesive\SDK;

use Exception;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CohesiveSDK
{
    private $baseUrl;
    private $apiKey;
    private $appId;
    private $appSecret;

    public function __construct($baseUrl = null, $apiKey = null, $appId = null, $appSecret = null)
    {
        $this->baseUrl = $baseUrl ?: getenv('COHESIVE_BASE_URL');
        $this->apiKey = $apiKey ?: getenv('COHESIVE_API_KEY');
        $this->appId = $appId ?: getenv('COHESIVE_APP_ID');
        $this->appSecret = $appSecret ?: getenv('COHESIVE_APP_SECRET');
    }

    /**
     * @throws Exception
     */
    public function validateToken($token)
    {
        $decoded = JWT::decode($token, new Key($this->appSecret, 'HS256'));
        $payload = (array) $decoded;
        $authDetails = new AuthDetails();
        $authDetails->UserID = isset($payload['user_id']) ? $payload['user_id'] : null;
        $authDetails->UserName = isset($payload['user_name']) ? $payload['user_name'] : null;
        $authDetails->UserEmail = isset($payload['user_email']) ? $payload['user_email'] : null;
        $authDetails->Role = isset($payload['role']) ? $payload['role'] : null;
        $authDetails->WorkspaceID = isset($payload['workspace_id']) ? $payload['workspace_id'] : null;
        $authDetails->WorkspaceName = isset($payload['workspace_name']) ? $payload['workspace_name'] : null;
        $authDetails->InstanceID = isset($payload['instance_id']) ? $payload['instance_id'] : null;
        $authDetails->IsInTrial = isset($payload['is_in_trial']) ? $payload['is_in_trial'] : null;
        $authDetails->CurrentPeriodStartedAt = isset($payload['current_period_started_at']) ? $payload['current_period_started_at'] : null;
        $authDetails->CurrentPeriodEndsAt = isset($payload['current_period_ends_at']) ? $payload['current_period_ends_at'] : null;
        $authDetails->TrialItemsCount = isset($payload['trial_items_count']) ? $payload['trial_items_count'] : null;
        $authDetails->ItemsPerUnit = isset($payload['items_per_unit']) ? $payload['items_per_unit'] : null;

        return $authDetails;
    }
}


