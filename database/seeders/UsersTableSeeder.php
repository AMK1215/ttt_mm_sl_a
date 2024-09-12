<?php

namespace Database\Seeders;

use App\Enums\TransactionName;
use App\Enums\UserType;
use App\Models\User;
use App\Services\WalletService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Create Admin
        $admin = $this->createUser(UserType::Admin, 'Owner', 'luckym', '09123456789');
        (new WalletService)->deposit($admin, 10 * 100_000, TransactionName::CapitalDeposit);

        // Create Senior user under Admin
        $senior = $this->createUser(UserType::Senior, 'Senior 1', 'S123456', '09123456788', $admin->id);
        (new WalletService)->transfer($admin, $senior, 8 * 100_000, TransactionName::CreditTransfer);

        // Create Master user under Senior
        $master = $this->createUser(UserType::Master, 'Master 1', 'M123456', '09123456787', $senior->id);
        (new WalletService)->transfer($senior, $master, 6 * 100_000, TransactionName::CreditTransfer);

        // Create Agent user under Master
        $agent = $this->createUser(UserType::Agent, 'Agent 1', 'A898737', '09112345674', $master->id, 'vH4HueE9');
        (new WalletService)->transfer($master, $agent, 5 * 100_000, TransactionName::CreditTransfer);

        // Create Player under Agent
        $player = $this->createUser(UserType::Player, 'Player 1', 'P111111', '09111111111', $agent->id);
        (new WalletService)->transfer($agent, $player, 30000, TransactionName::CreditTransfer);
    }

    private function createUser(UserType $type, string $name, string $user_name, string $phone, ?int $parent_id = null, ?string $referral_code = null): User
    {
        return User::create([
            'name' => $name,
            'user_name' => $user_name,
            'phone' => $phone,
            'password' => Hash::make('delightmyanmar'),
            'agent_id' => $parent_id,
            'status' => 1,
            'type' => $type->value,
            // 'name' => $name,
            // 'user_name' => $user_name,
            // 'phone' => $phone,
            // 'password' => Hash::make('delightmyanmar'),
            // 'agent_id' => $parent_id, // Parent agent or role
            // 'status' => 1,
            // 'referral_code' => $referral_code,
            // 'is_changed_password' => 1,
            // 'type' => $type->value, // Enum for user type (Admin, Senior, Master, Agent, Player)
            // 'payment_type_id' => 1,
            // 'account_name' => 'Test',
            // 'account_number' => '3498787787'
        ]);
    }
}

// class UsersTableSeeder extends Seeder
// {
//     public function run(): void
//     {
//         $admin = $this->createUser(UserType::Admin, 'Owner', 'shan', '09123456789');
//         (new WalletService)->deposit($admin, 10 * 100_000, TransactionName::CapitalDeposit);

//         $senior = $this->createUser(UserType::Senior, 'Senior', 'SKM34564', '09112345674', $admin->id);
//         (new WalletService)->transfer($admin, $senior, 5 * 100_000, TransactionName::CreditTransfer);

//         $master = $this->createUser(UserType::Master, 'Master', 'SKM234343', '09112345674', $senior->id);
//         (new WalletService)->transfer($senior, $master, 5 * 100_000, TransactionName::CreditTransfer);

//         $agent = $this->createUser(UserType::Agent, 'Agent', 'SKM324343', '09112345674', $master->id);
//         (new WalletService)->transfer($master, $agent, 5 * 100_000, TransactionName::CreditTransfer);

//         $player = $this->createUser(UserType::Player, 'Player 1', 'Player001', '09111111111', $agent->id);
//         (new WalletService)->transfer($agent, $player, 30000.1234, TransactionName::CreditTransfer);
//     }

//     private function createUser(UserType $type, string $name, string $user_name, string $phone, ?int $parent_id = null, ?string $referral_code = null): User
//     {
//         $user = User::create([
//             'name' => $name,
//             'user_name' => $user_name,
//             'phone' => $phone,
//             'password' => Hash::make('delightmyanmar'),
//             'agent_id' => $parent_id,
//             'status' => 1,
//             'type' => $type->value,
//         ]);

//         return $user;
//     }
// }