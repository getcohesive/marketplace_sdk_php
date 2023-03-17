<?php
namespace Cohesive\SDK\Test;

use Cohesive\SDK\CohesiveSDK;
use Firebase\JWT\JWT;
use PHPUnit\Framework\TestCase;

/**
 * Summary of CohesiveSDKTest
 */
class CohesiveSDKTest extends TestCase
{
    /**
     * Summary of testCohesiveSDKValidateToken
     * @return void
     * @throws \Exception
     */
    public function testCohesiveSDKValidateToken()
    {
        $sdk = new CohesiveSDK(
            'https://example.com',
            'api_key',
            'app_id',
            'app_secret'
        );

        $payload = [
            'user_id' => '123',
            'user_name' => 'john_doe',
            'user_email' => 'john.doe@example.com',
            'role' => 'user',
            'workspace_id' => '456',
            'workspace_name' => 'example_workspace',
            'instance_id' => '789',
            'is_in_trial' => true,
            'current_period_started_at' => '2022-01-01T00:00:00.000Z',
            'current_period_ends_at' => '2022-01-31T23:59:59.999Z',
            'trial_items_count' => 10,
            'items_per_unit' => 5
        ];
        $token = JWT::encode($payload, "app_secret", 'HS256');

        fwrite(STDOUT, $token);
        $authDetails = $sdk->validateToken($token);

        $this->assertEquals('123', $authDetails->UserID);
        $this->assertEquals('john_doe', $authDetails->UserName);
        $this->assertEquals('john.doe@example.com', $authDetails->UserEmail);
        $this->assertEquals('user', $authDetails->Role);
        $this->assertEquals('456', $authDetails->WorkspaceID);
        $this->assertEquals('example_workspace', $authDetails->WorkspaceName);
        $this->assertEquals('789', $authDetails->InstanceID);
        $this->assertEquals(true, $authDetails->IsInTrial);
        $this->assertEquals('2022-01-01T00:00:00.000Z', $authDetails->CurrentPeriodStartedAt);
        $this->assertEquals('2022-01-31T23:59:59.999Z', $authDetails->CurrentPeriodEndsAt);
        $this->assertEquals(10, $authDetails->TrialItemsCount);
        $this->assertEquals(5, $authDetails->ItemsPerUnit);
    }
}



